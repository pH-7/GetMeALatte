<?php
/**
 * @author    Pierre-Henry Soria <hi@ph7.me>
 * @license   MIT License; <https://opensource.org/licenses/MIT>
 */

declare(strict_types=1);

namespace GetMeALatteLike\Controller;

use GetMeALatteLike\Kernel\Input;
use GetMeALatteLike\Kernel\PhpTemplate\View;
use GetMeALatteLike\Service\Item as ItemService;
use GetMeALatteLike\Service\Payment as PaymentService;
use GetMeALatteLike\Service\User as UserService;
use GetMeALatteLike\Service\UserValidation;
use stdClass;

class Payment extends Base
{
    public const DEFAULT_CURRENCY = 'USD';

    private UserService $userService;
    private UserValidation $userValidation;
    private PaymentService $paymentService;
    private ItemService $itemService;

    public function __construct()
    {
        parent::__construct();

        $this->userService = new UserService();
        $this->userValidation = new UserValidation();
        $this->paymentService = new PaymentService();
        $this->itemService = new ItemService();
    }

    public function payment(): void
    {
        $viewVariables = [
            'isLoggedIn' => $this->isLoggedIn
        ];

        $userId = $this->userSessionService->getId();
        $doesUserPaymentExist = $this->paymentService->doesPaymentExist($userId);

        if (Input::postExists('payment_submit')) {
            $paypalEmail = Input::post('paypal_email');
            $currency = Input::post('currency');

            if (isset($paypalEmail, $currency)) {
                if (!$this->userValidation->isEmailValid($paypalEmail)) {
                    $viewVariables[View::ERROR_MESSAGE_KEY] = 'PayPal email not valid';
                } elseif ($doesUserPaymentExist) {
                    // Update Payment Details
                    $this->paymentService->update($userId, $paypalEmail, $currency);
                    $viewVariables[View::SUCCESS_MESSAGE_KEY] = 'Payment details saved!';
                } else {
                    // Add Payment details
                    $this->paymentService->create(
                        [
                            'userId' => $userId,
                            'paypalEmail' => $paypalEmail,
                            'currency' => $currency,
                        ]
                    );
                    $successMessage = sprintf('Payment successfully added. <br> You can now <a href="%s">add an item</a> 🥳', site_url('/item'));
                    $viewVariables[View::SUCCESS_MESSAGE_KEY] = $successMessage;
                }
            } else {
                $viewVariables[View::ERROR_MESSAGE_KEY] = 'All fields are required.';
            }
        }

        $viewVariables['paypalEmail'] = '';
        $viewVariables['currency'] = self::DEFAULT_CURRENCY;
        if ($doesUserPaymentExist) {
            if ($paymentDetails = $this->paymentService->getPaymentDetails($userId)) {
                $viewVariables['paypalEmail'] = $paymentDetails->paypalEmail;
                $viewVariables['currency'] = $paymentDetails->currency;
            }
        }

        View::output('payment/payment', 'Payment Gateway', $viewVariables);
    }

    public function item(): void
    {
        $viewVariables = [
            'isLoggedIn' => $this->isLoggedIn,
            'isFieldDisabled' => false,

        ];

        $userId = $this->userSessionService->getId();
        $doesItemExist = $this->itemService->hasUserAnItem($userId);

        if (!$this->paymentService->doesPaymentExist($userId)) {
            $viewVariables['isFieldDisabled'] = true;
            $message = sprintf('⚠️ You need to set <a href="%s">your payment method</a> first.', site_url('/payment'));
            $viewVariables[View::ERROR_MESSAGE_KEY] = $message;
        }

        if (Input::postExists('item_submit')) {
            $idName = Input::post('id_name');
            $itemName = Input::post('item_name');
            $businessName = Input::post('business_name');
            $summary = Input::post('summary');
            $price = Input::post('price');

            if (isset($idName, $itemName, $summary)) {
                if (!$this->doesItemIdNameAlreadyExist($idName, $this->itemService->getFromUserId($userId))) {
                    $inputItemDetails = [
                        'idName' => $idName,
                        'itemName' => $itemName,
                        'businessName' => $businessName,
                        'summary' => $summary,
                        'price' => (float)$price
                    ];

                    $doesItemExist ?
                        $this->itemService->update($userId, $inputItemDetails) :
                        $this->itemService->create($userId, $inputItemDetails);

                    $viewVariables[View::SUCCESS_MESSAGE_KEY] = 'Successfully saved';
                } else {
                    $viewVariables[View::ERROR_MESSAGE_KEY] = sprintf('The "%s" ID name already exist. Pick up another one please 🙂', $idName);
                }
            } else {
                $viewVariables[View::ERROR_MESSAGE_KEY] = 'Some required fields are left empty.';
            }
        }

        $viewVariables['idName'] = '';
        $viewVariables['itemName'] = '';
        $viewVariables['businessName'] = '';
        $viewVariables['summary'] = '';
        $viewVariables['price'] = '';
        $viewVariables['shareItemUrl'] = '';
        if ($itemDetails = $this->itemService->getFromUserId($userId)) {
            $viewVariables['idName'] = $itemDetails->idName;
            $viewVariables['itemName'] = $itemDetails->itemName;
            $viewVariables['businessName'] = $itemDetails->businessName;
            $viewVariables['summary'] = $itemDetails->summary;
            $viewVariables['price'] = (float)$itemDetails->price;
            $viewVariables['shareItemUrl'] = $this->itemService->getUserItemUrl($itemDetails->idName);
        }

        View::output('payment/item', 'Edit Item', $viewVariables);
    }

    public function showItem(): void
    {
        $viewVariables = [
            'isLoggedIn' => $this->isLoggedIn
        ];

        $idName = Input::get('id');

        if ($itemData = $this->itemService->getFromIdName($idName)) {
            $viewVariables += [
                'idName' => $itemData->idName,
                'itemName' => $itemData->itemName,
                'businessName' => $itemData->businessName,
                'summary' => $itemData->summary,
                'price' => $itemData->price,
                'paymentLink' => $this->paymentService->getPayPalLink($itemData),
                'currency' => $itemData->currency
            ];

            $pageTitle = sprintf('Item %s', $itemData->itemName);
            View::output('payment/show', $pageTitle, $viewVariables);
        } else {
            $this->pageNotFound();
        }
    }

    private function doesItemIdNameAlreadyExist(string $idName, bool|stdClass $itemDetails): bool
    {
        if (!empty($itemDetails->idName) && $itemDetails->idName === $idName) {
            return false;
        }

        return $this->itemService->doesItemIdNameExist($idName);
    }
}
