<?php

namespace Php\ContactManager\Controllers;

use eftec\bladeone\BladeOne;
use Exception;
use Laminas\Diactoros\Response\HtmlResponse;

/**
 * Classe HomeController étant le contrôleur d'accueil de l'application web.
 */
class HomeController
{
    /**
     * @var BladeOne $blade Étant l'instance de BladeOne. Il permet de renvoyer des réponses HTML liées à des vues.
     */
    private BladeOne $blade;

    /**
     * Constructeur de l'objet HomeController.
     */
    public function __construct()
    {
        $this->blade = new BladeOne(__DIR__ . "/../../views", __DIR__ . "/../../cache");
    }

    /**
     * Permet de renvoyer la page d'accueil au client.
     * @return HtmlResponse Étant la réponse qui sera envoyée au client.
     * @throws Exception
     */
    public function home(): HtmlResponse
    {
        $html = $this->blade->run('home', ['title' => 'Accueil']);
        return new HtmlResponse($html, 200);
    }
}