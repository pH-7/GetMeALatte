<?php

declare(strict_types=1);

namespace BuyMeACoffeeClone\Kernel\PhpTemplate;

use Symfony\Component\Templating\Helper\SlotsHelper;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;

final class View
{
    public const SUCCESS_MESSAGE_KEY = 'success_message';
    public const ERROR_MESSAGE_KEY = 'error_message';

    private const PATH = __DIR__ . '/../../../templates/%name%';
    private const FILE_EXTENSION = '.html.php';

    public static function render(string $viewFile, string $title, array $context = []): string
    {
        $context['title'] = $title;

        $filesystemLoader = new FilesystemLoader(self::PATH);

        $templating = new PhpEngine(new TemplateNameParser(), $filesystemLoader);
        $templating->set(new SlotsHelper());

        $viewRender = $templating->render('_partials/header.inc.html.php', $context);
        $viewRender .= $templating->render( $viewFile . self::FILE_EXTENSION, $context);
        $viewRender .= $templating->render('_partials/footer.inc.html.php');

        return $viewRender;
    }

    public static function output(string $viewFile, string $title, array $context = []): void
    {
        echo self::render($viewFile, $title, $context);
    }
}

