<?php

namespace BuyMeACoffeeClone\Controller;

use BuyMeACoffeeClone\Kernel\PhpTemplate\View;
use BuyMeACoffeeClone\Kernel\Session;
use BuyMeACoffeeClone\Service\UserSession as UserSessionService;

class Base
{
    protected UserSessionService $userSessionService;
    protected bool $isLoggedIn;

    public function __construct()
    {
        $this->userSessionService = new UserSessionService(new Session);
        $this->isLoggedIn = $this->userSessionService->isLoggedIn();
    }

    public function pageNotFound(): void
    {
        header('HTTP/1.1 404 Not Found');

        $viewVariables = [
            'isLoggedIn' => $this->isLoggedIn
        ];

        View::output('not-found', 'Page Not Found', $viewVariables);
    }
}
