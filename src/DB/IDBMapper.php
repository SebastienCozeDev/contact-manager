<?php

namespace Php\ContactManager\DB;

use Php\ContactManager\Models\Contact;

/**
 * Interface IDBMapper servant dans la simulation de la base de données.
 */
interface IDBMapper
{
    /**
     * Permet de lister l'ensemble des contacts.
     * @return array Étant le tableau des contacts.
     */
    function allContacts(): array;

    /**
     * Permet de trouver un contact à l'aide de son identifiant.
     * @param int $id Étant son identifiant.
     * @return Contact|false Étant le contact.
     */
    function findContactById(int $id): Contact|false;

    /**
     * Permet d'insérer un contact.
     * @param Contact $contact Étant le contact.
     * @return Contact|false Étant le contact.
     */
    function insertContact(Contact $contact): Contact|false;

    /**
     * Permet de modifier un contact.
     * @param Contact $contact Étant le contact.
     * @return Contact|false Étant le contact.
     */
    function updateContact(Contact $contact): Contact|false;

    /**
     * Permet de supprimer un contact.
     * @param int $id Étant son identifiant.
     * @return bool Vrai si la suppression a bien eu lieu.
     */
    function deleteContact(int $id): bool;
}