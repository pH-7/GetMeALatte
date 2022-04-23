<?php

namespace BuyMeACoffeeClone\Kernel\Database;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
    private static ?PDO $pdo;
    private static ?PDOStatement $statement;

    public static function connect(array $dbDetails): void
    {
        try {
            static::$pdo = new PDO(
                "mysql:host={$dbDetails['db_host']};dbname={$dbDetails['db_name']}",
                $dbDetails['db_user'],
                $dbDetails['db_password']
            );
        } catch (PDOException $except) {
            echo $except->getMessage();
            exit('An unexpected database error has occurred.');
        }
    }

    /**
     * Prepare a query and execute if applicable.
     */
    public static function query(string $sql, array $binds, bool $execute = true): bool
    {
        static::$statement = static::$pdo->prepare($sql);

        foreach($binds as $key => $value) {
            static::$statement->bindValue($key, $value);
        }

        if ($execute) {
            return static::$statement->execute();
        }

        return true;
    }

    public static function rowCount(): int
    {
        return static::$statement->rowCount();
    }

    public static function fetch()
    {
        return static::$statement->fetch( PDO::FETCH_OBJ);
    }

    public static function fetchAll(): ?array
    {
        return static::$statement->fetchAll(PDO::FETCH_OBJ) ?? null;
    }

    public static function lastInsertId(): string|bool
    {
        return static::$pdo->lastInsertId();
    }

    public static function quote(string $string): string
    {
        return static::$pdo->quote($string);
    }
}
