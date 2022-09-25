<?php

namespace Php\ContactManager\DB;

use Php\ContactManager\Models\Contact;
use Php\ContactManager\Models\MailAddress;
use Php\ContactManager\Models\PhoneNumber;

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
     * Permet de lister l'ensemble des numéros de téléphone.
     * @return array Étant le tableau des numéros de téléphone.
     */
    function allPhoneNumbers(): array;

    /**
     * Permet de lister l'ensemble des adresses mail.
     * @return array Étant le tableau des adresses mail.
     */
    function allMailAddresses(): array;

    /**
     * Permet de trouver un contact à l'aide de son identifiant.
     * @param int $id Étant son identifiant.
     * @return Contact|false Étant le contact.
     */
    function findContactById(int $id): Contact|false;

    /**
     * Permet de trouver un numéro de téléphone à l'aide de son identifiant.
     * @param int $id Étant son identifiant.
     * @return PhoneNumber|false Étant le numéro de téléphone.
     */
    function findPhoneNumberById(int $id): PhoneNumber|false;

    /**
     * Permet de trouver une adresse mail à l'aide de son identifiant.
     * @param int $id Étant son identifiant.
     * @return MailAddress|false Étant l'adresse mail.
     */
    function findMailAddressById(int $id): MailAddress|false;

    /**
     * Permet d'insérer un contact.
     * @param Contact $contact Étant le contact.
     * @return Contact|false Étant le contact.
     */
    function insertContact(Contact $contact): Contact|false;

    /**
     * Permet d'insérer un numéro de téléphone.
     * @param PhoneNumber $phoneNumber Étant le numéro de téléphone.
     * @return PhoneNumber|false Étant le numéro de téléphone.
     */
    function insertPhoneNumber(PhoneNumber $phoneNumber): PhoneNumber|false;

    /**
     * Permet d'insérer une adresse mail.
     * @param MailAddress $mailAddress Étant l'adresse mail.
     * @return MailAddress|false Étant l'adresse mail.
     */
    function insertMailAddress(MailAddress $mailAddress): MailAddress|false;

    /**
     * Permet de modifier un contact.
     * @param Contact $contact Étant le contact.
     * @return Contact|false Étant le contact.
     */
    function updateContact(Contact $contact): Contact|false;

    /**
     * Permet de modifier un numéro de téléphone.
     * @param PhoneNumber $phoneNumber Étant le numéro de téléphone.
     * @return PhoneNumber|false Étant le numéro de téléphone.
     */
    function updatePhoneNumber(PhoneNumber $phoneNumber): PhoneNumber|false;

    /**
     * Permet de modifier une adresse mail.
     * @param MailAddress $mailAddress Étant l'adresse mail.
     * @return MailAddress|false Étant l'adresse mail.
     */
    function updateMailAddress(MailAddress $mailAddress): MailAddress|false;

    /**
     * Permet de supprimer un contact.
     * @param int $id Étant son identifiant.
     * @return bool Vrai si la suppression a bien eu lieu.
     */
    function deleteContact(int $id): bool;

    /**
     * Permet de supprimer un numéro de téléphone.
     * @param int $id Étant son identifiant.
     * @return bool Vrai si la suppression a bien eu lieu.
     */
    function deletePhoneNumber(int $id): bool;

    /**
     * Permet de supprimer une adresse mail.
     * @param int $id Étant son identifiant.
     * @return bool Vrai si la suppression a bien eu lieu.
     */
    function deleteMailAddress(int $id): bool;

}