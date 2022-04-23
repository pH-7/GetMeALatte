<?php

declare(strict_types=1);

namespace BuyMeACoffeeClone\Service;

use BuyMeACoffeeClone\Model\User as UserModel;

class User
{
    private const PASSWORD_COST_FACTOR = 12;
    private const PASSWORD_ALGORITHM = PASSWORD_BCRYPT;
    
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function create(array $userDetails): string|bool
    {
        return $this->userModel->insert($userDetails);
    }

    public function updateEmail(string $userId, string $email): bool
    {
        return $this->userModel->updateEmail($userId, $email);
    }

    public function updateName(string $userId, string $name): bool
    {
        return $this->userModel->updateName($userId, $name);
    }

    public function updatePassword(string $userId, string $hashedPassword): bool
    {
        return $this->userModel->updatePassword($userId, $hashedPassword);
    }

    public function doesAccountEmailExist(string $email): bool
    {
        return $this->userModel->doesAccountEmailExist($email);
    }

    public function hashPassword(string $password): string
    {
        return (string)password_hash($password, self::PASSWORD_ALGORITHM, ['cost' => self::PASSWORD_COST_FACTOR]);
    }

    public function verifyPassword(string $clearedPassword, string $hashedPassword): bool
    {
        return password_verify($clearedPassword, $hashedPassword);
    }

    public function getDetailsFromEmail(string $email)
    {
        return $this->userModel->getUserDetails($email);
    }

    public function getDetailsFromId(string $userIdl)
    {
        return $this->userModel->getUserDetails($userIdl);
    }
    
    public function getHashedPassword(string $userId): string
    {
        $userDetails =  $this->userModel->getUserDetails($userId);

        return $userDetails->password ?? '';
    }
}
