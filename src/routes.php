<?php
/**
 * @author    Pierre-Henry Soria <hi@ph7.me>
 * @license   MIT License; <https://opensource.org/licenses/MIT>
 */

namespace GetMeALatteLike;

use GetMeALatteLike\Kernel\Http\Router;
use GetMeALatteLike\Kernel\PhpTemplate\ViewNotFound;
use GetMeALatteLike\Kernel\Session;
use GetMeALatteLike\Service\UserSession as UserSessionService;
use Exception;

$userSession = new UserSessionService(new Session());

try {
    Router::get('/', 'Homepage@index');
    Router::get('/about', 'Homepage@about');
    Router::getAndPost('/contact', 'Homepage@contact');

    if (!$userSession->isLoggedIn()) {
        Router::getAndPost('/signup', 'Account@signUp');
        Router::getAndPost('/signin', 'Account@signIn');
    }

    if ($userSession->isLoggedIn()) {
        Router::getAndPost('/account/edit', 'Account@edit');
        Router::getAndPost('/account/password', 'Account@password');
        Router::getAndPost('/payment', 'Payment@payment');
        Router::getAndPost('/item', 'Payment@item');
        Router::get('/showitem', 'Payment@showItem');
        Router::get('/account/logout', 'Account@logout');
    }

    Router::end();
} catch (Exception $err ) {
    echo $err->getMessage();
}
