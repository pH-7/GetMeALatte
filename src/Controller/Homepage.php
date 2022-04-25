<?php

declare(strict_types=1);

namespace GetMeALatteLike\Controller;

use GetMeALatteLike\Kernel\Input;
use GetMeALatteLike\Kernel\PhpTemplate\View;
use GetMeALatteLike\Service\Contact as ContactService;

class Homepage extends Base
{
    private ContactService $contactService;

    public function __construct()
    {
        parent::__construct();

        $this->contactService = new ContactService();
    }

    public function index(): void
    {
        $viewVariables = ['isLoggedIn' => $this->isLoggedIn];

        if ($this->userSessionService->isLoggedIn()) {
            $viewVariables['name'] = $this->userSessionService->getName();
        }

        View::output('home/index', 'Homepage', $viewVariables);
    }

    public function about(): void
    {
        $viewVariables = [
            'isLoggedIn' => $this->isLoggedIn,
            'siteName' => $_ENV['SITE_NAME'],
            'contactEmail' => $_ENV['ADMIN_EMAIL']
        ];

        View::output('home/about', 'About', $viewVariables);
    }

    public function contact(): void
    {
        $viewVariables = [
            'isLoggedIn' => $this->isLoggedIn
        ];

        if (Input::postExists('contact_submit')) {
            $name = Input::post('name');
            $email = Input::post('email');
            $message = Input::post('message');
            $phoneNumber = Input::post('phone_number');

            if (isset($name, $email, $message)) {
                $isSuccess = $this->contactService->sendEmailToSiteOwner([
                    'name' => $name,
                    'email' => $email,
                    'message' => $message,
                    'phoneNumber' => $phoneNumber
                ]);

                if ($isSuccess) {
                    $viewVariables[View::SUCCESS_MESSAGE_KEY] = 'Your message has been sent. We will get back to you.';
                } else {
                    $viewVariables[View::ERROR_MESSAGE_KEY] = 'An error has occurred while trying to reach us. Please send your message again later.';
                }
            } else {
                $viewVariables[View::ERROR_MESSAGE_KEY] = 'All fields are required.';
            }
        }

        View::output('home/contact', 'Contact Us', $viewVariables);
    }
}
