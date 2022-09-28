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
 * Accueil de l'application web.
 */
$router->get('/', [HomeController::class, 'home']);

/**
 * Affichage de l'ensemble des clients.
 */
$router->get('/contacts', [ContactsController::class, 'contacts']);

/**
 * Affichage d'un client en particulier.
 */
$router->get('id', '[0-9]+');
$router->get('/contacts/{id}', [ContactsController::class, 'contact']);

/**
 * Création d'un client.
 */
$router->get('/contacts/create', [ContactsController::class, 'createContactGet']);
$router->post('/contacts', [ContactsController::class, 'createContactPost']);



try {
    $router->dispatch();
} catch (RouteNotFoundException $e) {
    $router->getPublisher()->publish(new HtmlResponse('Page non trouvée', 404));
} catch (Throwable $e) {
    $router->getPublisher()->publish(new TextResponse('Erreur interne. Merci de contacter l\'administrateur du site.', 500));
}