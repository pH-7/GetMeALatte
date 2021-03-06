<?php
/**
 * @author    Pierre-Henry Soria <hi@ph7.me>
 * @license   MIT License; <https://opensource.org/licenses/MIT>
 */

declare(strict_types=1);

namespace GetMeALatteLike\Kernel;

final class Input
{
    public static function get(string $key): null|string|array
    {
        return $_GET[$key] ?? '';
    }

    public static function post(string $key): null|string|array
    {
        return $_POST[$key] ?? '';
    }

    public static function postExists(string $key): bool
    {
        return !empty($_POST[$key]);
    }

    public static function getExists(string $key): bool
    {
        return !empty($_GET[$key]);
    }
}
