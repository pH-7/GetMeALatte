<?php

declare(strict_types=1);

function site_url(string $value = ''): string {
    if (!empty($value)) {
        return $_ENV['SITE_URL'] . $value;
    }

    return $_ENV['SITE_URL'];
}

function site_name(): string {
    return $_ENV['SITE_NAME'];
}

function redirect(string $value = null, $permanent = true): void {
    if ($permanent) {
        header('HTTP/1.1 301 Moved Permanently');
    }

    if (!empty($value)) {
        // Use ternary conditional operator
        $url = str_contains($value, 'http') ? $value : $_ENV['SITE_URL'] . $value;
    } else {
        $url = $_ENV['SITE_URL'];
    }

    header('Location: ' . $url);
    exit;
}

function escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES);
}
