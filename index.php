<?php
/**
 * @author    Pierre-Henry Soria <hi@ph7.me>
 * @license   MIT License; <https://opensource.org/licenses/MIT>
 */

require __DIR__ . '/vendor/autoload.php';

use GetMeALatteLike\Kernel\Bootstrap;

ob_start();
$app = new Bootstrap();
$app->run();
ob_end_flush();
