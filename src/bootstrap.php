<?php

//http only
ini_set( 'session.cookie_secure', "0" );
ini_set( 'session.cookie_httponly', "1" );

require_once __DIR__ . '/../vendor/autoload.php';


use App\Core\App;
use App\Core\Exception\NotFoundException;
use App\Core\Response;
use App\Core\Security;
use App\Database;



if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
} else if ((time() - $_SESSION['CREATED']) > 60) {
    // session started more than 30 minutes ago
    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    $_SESSION['CREATED'] = time();  // update creation time
}

$config = require_once __DIR__ . '/../config/config.php';
App::bind("config", $config);

$flash = new \App\Core\Helpers\FlashMessage();
$redirect = new \App\Core\Router();
$security = new Security();
App::bind("security", $security);





$security = new Security();
App::bind("security", $security);

App::bind("flash", $flash );
App::bind("router", $redirect);
App::bind("DB", Database::getConnection());
App::bind(Response::class, new Response());





