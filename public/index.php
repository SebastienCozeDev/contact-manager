<?php

use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\TextResponse;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;
use MiladRahimi\PhpRouter\Router;
use Php\ContactManager\Controllers\HomeController;

require("../vendor/autoload.php");

$router = Router::create();

$router->get('/', [HomeController::class, 'home']);

try {
    $router->dispatch();
} catch (RouteNotFoundException $e) {
    $router->getPublisher()->publish(new HtmlResponse('Page non trouvée', 404));
} catch (Throwable $e) {
    $router->getPublisher()->publish(new TextResponse('Erreur interne. Merci de contacter l\'administrateur du site.', 500));
}