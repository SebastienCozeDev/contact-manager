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
     * Permet de renvoyer la page des contacts au client.
     * @return HtmlResponse Étant la réponse qui sera envoyée au client.
     * @throws Exception
     */
    public function contacts(): HtmlResponse
    {
        $contacts = $this->bd->allContacts();
        $html = $this->blade->run('list-all-contacts', ['title' => 'Liste des contacts', 'contacts' => $contacts]);
        return new HtmlResponse($html, 200);
    }

    /**
     * Permet de renvoyer la page du contact voulu au client.
     * @param int $id Étant l'identifiant de ce contact.
     * @return HtmlResponse Étant la réponse qui sera envoyée au client.
     * @throws Exception
     */
    public function contact(int $id): HtmlResponse
    {
        $contact = $this->bd->findContactById($id);
        $html = $this->blade->run("contact-details", ['title' => $contact->getId(), 'contact' => $contact]);
        return new HtmlResponse($html, 200);
    }
}