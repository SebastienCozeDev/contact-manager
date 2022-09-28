<?php

namespace Php\ContactManager\Controllers;

use eftec\bladeone\BladeOne;
use Exception;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use MongoDB\Driver\Server;
use Php\ContactManager\DB\DBMapper;
use Php\ContactManager\Models\CivilityTitle;
use Php\ContactManager\Models\Contact;

/**
 * Classe ContactsController étant le contrôleur qui gère les contacts.
 */
class ContactsController
{
    /**
     * @var BladeOne $blade Étant l'instance de BladeOne. Il permet de renvoyer des réponses HTML liées à des vues.
     */
    private BladeOne $blade;

    private DBMapper $db;

    /**
     * Constructeur de l'objet HomeController.
     * @throws Exception
     */
    public function __construct()
    {
        $this->blade = new BladeOne(__DIR__ . "/../../views", __DIR__ . "/../../cache");
        $this->db = DBMapper::getInstance();
    }

    /**
     * Permet de renvoyer la page des contacts au client.
     * @return HtmlResponse Étant la réponse qui sera envoyée au client.
     * @throws Exception
     */
    public function contacts(): HtmlResponse
    {
        $contacts = $this->db->allContacts();
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
        $contact = $this->db->findContactById($id);
        $html = $this->blade->run("contact-details", ['title' => $contact->getLastName() . ' ' . $contact->getFirstName(), 'contact' => $contact, 'civilityTitle' => CivilityTitle::doStuff($contact->getCivilityTitle()), 'noKnown' => 'Non renseigné']);
        return new HtmlResponse($html, 200);
    }

    /**
     * Permet de renvoyer la page de la création du contact au client.
     * @return HtmlResponse Étant la réponse qui sera envoyée au client.
     * @throws Exception
     */
    public function createContactGet(): HtmlResponse
    {
        $contact = new Contact();
        $html = $this->blade->run('create-contact', ['title' => 'Nouveau contact', 'contact' => $contact]);
        return new HtmlResponse($html, 200);
    }

    /**
     * Permet de renvoyer la page de modification du contact au client.
     * @param int $id Étant l'identifiant du contact à modifier.
     * @return HtmlResponse Étant la réponse qui sera envoyée au client.
     * @throws Exception
     */
    public function updateContactGet(int $id): HtmlResponse
    {
        $contact = $this->db->findContactById($id);
        $html = $this->blade->run('update-contact', ['contact' => $contact]);
        return new HtmlResponse($html, 200);
    }

    /**
     * Permet de gérer la demande de création de contact.
     * @param ServerRequest $request Étant la requête reçue par le serveur.
     * @return string|RedirectResponse Étant la réponse donnée au client.
     * @throws Exception
     */
    public function createContactPost(ServerRequest $request): string|RedirectResponse
    {
        $contact = new Contact();
        $error = $this->validContact($request, $contact);
        if (!empty($error)) {
            return $this->blade->run('create-contact', ['title' => 'Nouveau contact', 'contact' => $contact, 'feedback' => $error]);
        }
        $this->db->insertContact($contact);
        return new RedirectResponse('/contacts/'.$contact->getId());
    }

    /**
     * Permet de gérer la demande de modification du contact.
     * @param ServerRequest $request Étant la requête reçue par le serveur.
     * @return string|RedirectResponse Étant la réponse donnée au client.
     * @throws Exception
     */
    public function updateContactPost(int $id, ServerRequest $request): string|RedirectResponse
    {
        $contact = $this->db->findContactById($id);
        $error = $this->validContact($request, $contact);
        if (!empty($error)) {
            return $this->blade->run('update-contact', ['contact' => $contact, 'feedback' => $error]);
        }
        $this->db->updateContact($contact);
        return new RedirectResponse('/contacts/'.$contact->getId());
    }

    /**
     * Permet d'avoir l'erreur, si elle existe, de la création ou de la modification d'un contact.
     * @param ServerRequest $request Étant la requête du serveur.
     * @param Contact $contact Étant le contact voulu.
     * @return string Étant l'erreur de création ou de modification. Si elle n'existe pas, un string vide est renvoyé.
     */
    public function validContact(ServerRequest $request, Contact $contact): string
    {
        $error = '';
        $attributs = $request->getParsedBody();
        $civilityTitle = $attributs['civilityTitle'];
        $lastName = $attributs['lastName'];
        $firstName = $attributs['firstName'];
        $secondName = $attributs['secondName'];
        $organisation = $attributs['organisation'];
        $position = $attributs['position'];
        $phoneNumber = $attributs['phoneNumber'];
        $mailAddress = $attributs['mailAddress'];
        $note = $attributs['note'];
        if (empty($civilityTitle)) $contact->setCivilityTitle(CivilityTitle::AUTRE);
        else $contact->setCivilityTitle(CivilityTitle::fromString($civilityTitle));
        $contact->setFirstName($firstName);
        $contact->setSecondName($secondName);
        $contact->setOrganisation($organisation);
        $contact->setPosition($position);
        $contact->setNote($note);
        if (empty($lastName)) $error = 'Le nom du contact est obligatoire pour la création du contact.';
        elseif (empty($phoneNumber) && empty($mailAddress)) $error = 'Au minimum, le contact doit posséder un numéro de téléphone ou une adresse mail.';
        if (!empty($lastName)) $contact->setLastName($lastName);
        if (!empty($phoneNumber)) $contact->setPhoneNumber($phoneNumber);
        if (!empty($mailAddress)) $contact->setMailAddress($mailAddress);
        return $error;
    }
}