<?php

namespace Php\ContactManager\Controllers;

use eftec\bladeone\BladeOne;
use Exception;
use Laminas\Diactoros\Response\HtmlResponse;
use Php\ContactManager\DB\DBMapper;

/**
 * Classe ContactsController étant le contrôleur qui gère les contacts.
 */
class ContactsController
{
    /**
     * @var BladeOne $blade Étant l'instance de BladeOne. Il permet de renvoyer des réponses HTML liées à des vues.
     */
    private BladeOne $blade;

    private DBMapper $bd;

    /**
     * Constructeur de l'objet HomeController.
     * @throws Exception
     */
    public function __construct()
    {
        $this->blade = new BladeOne(__DIR__ . "/../../views", __DIR__ . "/../../cache");
        $this->bd = DBMapper::getInstance();
    }

    /**
     * Permet de renvoyer la page d'accueil au client.
     * @return HtmlResponse Étant la réponse qui sera envoyée au client.
     * @throws Exception
     */
    public function contacts(): HtmlResponse
    {
        $contacts = $this->bd->allContacts();
        $html = $this->blade->run('list-all-contacts', ['title' => 'Liste des contacts', 'contacts' => $contacts]);
        return new HtmlResponse($html, 200);
    }
}