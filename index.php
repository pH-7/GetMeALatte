<?php
require __DIR__ . '/vendor/autoload.php';

use GetMeALatteLike\Kernel\Bootstrap;

ob_start();
$app = new Bootstrap();
$app->run();
ob_end_flush();
