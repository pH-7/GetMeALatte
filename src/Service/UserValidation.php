<?php

declare(strict_types=1);

namespace BuyMeACoffeeClone\Service;

class UserValidation
{
    private const MINIMUM_PASSWORD = 5;
    private const MAXIMUM_EMAIL_LENGTH = 100;

    private const MINIMUM_NAME_LENGTH = 2;
    private const MAXIMUM_NAME_LENGTH = 20;

    public function isEmailValid(string $email): bool
    {
        return
            strlen($email) <= self::MAXIMUM_EMAIL_LENGTH &&
            filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function isPasswordValid(string $password): bool
    {
        return strlen($password) >= self::MINIMUM_PASSWORD;
    }

    public function isNameValid(string $name): bool
    {
        return strlen($name) >= self::MINIMUM_NAME_LENGTH && strlen($name) <= self::MAXIMUM_NAME_LENGTH;
    }
}
