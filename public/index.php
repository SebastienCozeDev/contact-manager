<?php

use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\TextResponse;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;
use MiladRahimi\PhpRouter\Router;
use Php\ContactManager\Controllers\ContactsController;
use Php\ContactManager\Controllers\HomeController;

require("../vendor/autoload.php");

$router = Router::create();

/**
 * Route de la page d'accueil.
 */
$router->get('/', [HomeController::class, 'home']);

/**
 * Route de la page des contacts.
 */
$router->get('/contacts', [ContactsController::class, 'contacts']);

/**
 * Route de la page de contact particulier.
 */
$router->get('id', '[0-9]+');
$router->get('/contacts/{id}', [ContactsController::class, 'contact']);

try {
    $router->dispatch();
} catch (RouteNotFoundException $e) {
    $router->getPublisher()->publish(new HtmlResponse('Page non trouvée', 404));
} catch (Throwable $e) {
    $router->getPublisher()->publish(new TextResponse('Erreur interne. Merci de contacter l\'administrateur du site.', 500));
}