<?php

declare(strict_types=1);

namespace BuyMeACoffeeClone\Model;

use BuyMeACoffeeClone\Kernel\Database\Database;

class Item
{
    private const TABLE_NAME = 'items';

    public function insert(string $userId, array $itemDetails): string|bool
    {
        $sql = 'INSERT INTO ' . self::TABLE_NAME . ' (userId, idName, itemName, businessName, summary, price) 
            VALUES(:userId, :idName, :itemName, :businessName, :summary, :price)';

        $binds = [
            'userId' => $userId,
            'idName' => $itemDetails['idName'],
            'itemName' => $itemDetails['itemName'],
            'businessName' => $itemDetails['businessName'],
            'summary' => $itemDetails['summary'],
            'price' => $itemDetails['price']
        ];

        if (Database::query($sql, $binds)) {
            return Database::lastInsertId();
        }

        return false;
    }

    public function update(string $userId, array $itemDetails): bool
    {
        $sql = 'UPDATE ' . self::TABLE_NAME . ' SET idName = :idName, itemName = :itemName, businessName = :businessName, summary = :summary, price = :price WHERE userId = :userId LIMIT 1';

        return Database::query($sql, [
            'userId' => $userId,
            'idName' => $itemDetails['idName'],
            'itemName' => $itemDetails['itemName'],
            'businessName' => $itemDetails['businessName'],
            'summary' => $itemDetails['summary'],
            'price' => $itemDetails['price']
        ]);
    }

    public function get(string $value)
    {
        $sql = 'SELECT * FROM ' . self::TABLE_NAME . ' AS i INNER JOIN ' . Payment::TABLE_NAME . ' AS p USING(userId) WHERE idName = :value OR i.userId = :value LIMIT 1';

        Database::query($sql, ['value' => $value]);

        return Database::fetch();
    }

    public function hasUserAnItem(string $userId): bool
    {
        $sql = 'SELECT userId FROM ' . self::TABLE_NAME . ' WHERE userId = :userId LIMIT 1';

        Database::query($sql, ['userId' => $userId]);

        return Database::rowCount() >= 1;
    }

    public function doesIdNameExist(string $idName): bool
    {
        $sql = 'SELECT idName FROM ' . self::TABLE_NAME . ' WHERE idName = :idName LIMIT 1';

        Database::query($sql, ['idName' => $idName]);

        return Database::rowCount() >= 1;
    }
}
