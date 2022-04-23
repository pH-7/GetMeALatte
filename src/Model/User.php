<?php

declare(strict_types=1);

namespace BuyMeACoffeeClone\Model;

use BuyMeACoffeeClone\Kernel\Database\Database;

class User
{
    private const TABLE_NAME = 'users';

    public function insert(array $userDetails): string|bool
    {
        $sql = 'INSERT INTO ' . self::TABLE_NAME . ' (fullname, email, password) VALUES(:fullname, :email, :password)';

        if (Database::query($sql, $userDetails)) {
            return Database::lastInsertId();
        }

        return false;
    }

    public function doesAccountEmailExist(string $email): bool
    {
        $sql = 'SELECT email FROM ' . self::TABLE_NAME . ' WHERE email = :email LIMIT 1';

        Database::query($sql, ['email' => $email]);

        // We check if the query returned one or one email addresses
        return Database::rowCount() >= 1;
    }

    public function getUserDetails(string $uniqueUserValue)
    {
        $sql = 'SELECT * FROM ' . self::TABLE_NAME . ' WHERE email = :value OR userId = :value LIMIT 1';
        Database::query($sql, ['value' => $uniqueUserValue]);

        return Database::fetch();
    }

    public function updateEmail(string $userId, string $email): bool
    {
        $sql = 'UPDATE ' . self::TABLE_NAME . ' SET email = :email WHERE userId = :userId LIMIT 1';

        return Database::query($sql, ['userId' => $userId, 'email' => $email]);
    }

    public function updateName(string $userId, string $name): bool
    {
        $sql = 'UPDATE ' . self::TABLE_NAME . ' SET fullname = :name WHERE userId = :userId LIMIT 1';

        return Database::query($sql, ['userId' => $userId, 'name' => $name]);
    }

    public function updatePassword(string $userId, string $hashedPassword): bool
    {
        $sql = 'UPDATE ' . self::TABLE_NAME . ' SET password = :hashedPassword WHERE userId = :userId LIMIT 1';

        return Database::query($sql, [':userId' => $userId, ':hashedPassword' => $hashedPassword]);
    }
}
