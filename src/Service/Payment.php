<?php

namespace BuyMeACoffeeClone\Service;

use BuyMeACoffeeClone\Model\Payment as PaymentModel;
use stdClass;

class Payment
{
    private const PAYPAL_PAYMENT_URL = 'https://www.paypal.com/cgi-bin/websrc';

    private PaymentModel $paymentModel;

    public function __construct()
    {
        $this->paymentModel = new PaymentModel();
    }

    public function create(array $paymentDetails): string|bool
    {
        return $this->paymentModel->insert($paymentDetails);
    }

    public function update(string $userId, string $paypalEmail, string $currency): bool
    {
        return $this->paymentModel->update($userId, $paypalEmail, $currency);
    }

    public function doesPaymentExist(string $userId): bool
    {
        return $this->paymentModel->doesDetailsExist($userId);
    }

    public function getPaymentDetails(string $userId)
    {
        return $this->paymentModel->getDetails($userId);
    }

    public function getPayPalLink(stdClass $itemData): string
    {
        $queries = [
            'cmd' => '_xclick',
            'business' => $itemData->paypalEmail,
            'itemName' => $itemData->itemName,
            'amount' => $itemData->price,
            'currency_code' => $itemData->currency
        ];

        return self::PAYPAL_PAYMENT_URL . '?' . http_build_query($queries);
    }
}
