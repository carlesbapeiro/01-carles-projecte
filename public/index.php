<?php

use App\Core\App;
use App\Core\Exception\AppException;
use App\Core\Exception\AuthorizationException;
use App\Core\Request;
use App\Core\Router;


    require_once __DIR__ . '/../src/bootstrap.php';

    session_start();
    $request = new Request();

    $url = $request->getPath();
    $router = new Router();
    require_once __DIR__ . '/../config/routes.php';


    App::bind(Router::class, $router);


    try {

        echo $router->route($url, $request->getMethod());



    } catch (AppException $error){

        echo $error->handleException();
    }




