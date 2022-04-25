<?php
/**
 * @author    Pierre-Henry Soria <hi@ph7.me>
 * @license   MIT License; <https://opensource.org/licenses/MIT>
 */

declare(strict_types=1);

namespace GetMeALatteLike\Kernel;

class Session
{
    public function __construct(bool $autoSessionStart = true)
    {
        if ($autoSessionStart) {
            $this->initialize();
        }
    }

    public function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Allows creating more than one session.
     */
    public function sets(array $data): void
    {
        foreach ($data as $key => $value) {
            $this->set($key, $value);
        }
    }

    public function get(string $key)
    {
        return $_SESSION[$key] ?? false;
    }

    public function doesExist(string $key): bool
    {
        return !empty($_SESSION[$key]);
    }

    public function destroy(): void
    {
        if (!empty($_SESSION)) {
            $_SESSION = [];
            session_unset();
            session_destroy();
        }
    }

    private function isActivated(): bool
    {
        return session_status() === PHP_SESSION_ACTIVE;
    }

    private function initialize()
    {
        if (!$this->isActivated()) {
            session_start();
        }
    }
}
