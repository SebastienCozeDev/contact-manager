<?php

namespace Php\ContactManager\Models;

use JsonSerializable;
use ReturnTypeWillChange;

/**
 * Classe Contact correspondant à un contact.
 */
class Contact implements JsonSerializable
{

    /**
     * @var int $id Étant l'identifiant du contact.
     */
    protected int $id;

    /**
     * @var CivilityTitle $civilityTitle Étant le titre de civilité du contact.
     */
    protected CivilityTitle $civilityTitle;

    /**
     * @var string $lastName Étant le nom de famille du contact.
     */
    protected string $lastName;

    /**
     * @var string $firstName Étant le premier nom du contact.
     */
    protected string $firstName;

    /**
     * @var string $secondName Étant le second prénom du contact.
     */
    protected string $secondName;

    /**
     * @var string $company Étant l'organisation du contact.
     */
    protected string $company;

    /**
     * @var string $position Étant le poste du contact.
     */
    protected string $position;

    /**
     * @var array $phoneNumbers Étant la liste des numéros de téléphone du contact.
     */
    protected array $phoneNumbers;

    /**
     * @var array $mailAddresses Étant la liste des adresses mail du contact.
     */
    protected array $mailAddresses;

    /**
     * @var string $note Étant la note du contact.
     */
    protected string $note;

    /**
     * Constructeur de l'objet Contact.
     * @param int $id
     * @param CivilityTitle $civilityTitle
     * @param string $lastName
     * @param string $firstName
     * @param string $secondName
     * @param string $company
     * @param string $position
     * @param array $phoneNumbers
     * @param array $mailAddresses
     * @param string $note
     */
    public function __construct(int $id = 0, CivilityTitle $civilityTitle = CivilityTitle::AUTRE, string $lastName = '', string $firstName = '', string $secondName = '', string $company = '', string $position = '', array $phoneNumbers = [], array $mailAddresses = [], string $note = '')
    {
        $this->id = $id;
        $this->civilityTitle = $civilityTitle;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->$company = $company;
        ($company == '') ? $this->position = $position : $this->position = '';
        $this->phoneNumbers = $phoneNumbers;
        $this->mailAddresses = $mailAddresses;
        $this->note = $note;
    }

    /**
     * Getter pour l'identifiant du contact.
     * @return int Étant l'identifiant du contact.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Getter pour le titre de civilité.
     * @return CivilityTitle Étant le titre de civilité du contact.
     */
    public function getCivilityTitle(): CivilityTitle
    {
        return $this->civilityTitle;
    }

    /**
     * @return string Étant le nom de famille du contact.
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string Étant le premier prénom du contact.
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string Étant le second prénom du contact.
     */
    public function getSecondName(): string
    {
        return $this->secondName;
    }

    /**
     * Getter pour l'organisation du contact.
     * @return string Étant l'organisation du contact.
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * Getter pour le poste du contact.
     * @return string Étant la poste du contact.
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * Getter pour la liste des numéros de téléphone du contact.
     * @return array Étant le tableau des numéros de téléphone du contact.
     */
    public function getPhoneNumbers(): array
    {
        return $this->phoneNumbers;
    }

    /**
     * Getter pour la liste des adresses mail du contact.
     * @return array Étant le tableau des adresses mail du contact.
     */
    public function getMailAddresses(): array
    {
        return $this->mailAddresses;
    }

    /**
     * Getter pour la note du contact.
     * @return string Étant la note du contact.
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * Setter pour l'identifiant du contact.
     * @param int $id Étant le nouvel identifiant du contact.
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Setter pour le titre de civilité du contact.
     * @param CivilityTitle $civilityTitle Étant le titre de civilité du contact.
     */
    public function setCivilityTitle(CivilityTitle $civilityTitle): void
    {
        $this->civilityTitle = $civilityTitle;
    }

    /**
     * Setter pour le nom de famille du contact.
     * @param string $lastName Étant le nouveau nom de famille du contact.
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * Setter pour le premier prénom du contact.
     * @param string $firstName Étant le premier prénom du contact.
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * Setter pour le second prénom du contact.
     * @param string $secondName Étant le second prénom du contact.
     */
    public function setSecondName(string $secondName): void
    {
        $this->secondName = $secondName;
    }

    /**
     * @param string $company Étant l'organisation du contact.
     */
    public function setCompany(string $company): void
    {
        $this->company = $company;
    }

    /**
     * Setter pour le poste du contact.
     * @param string $position Étant le poste du contact.
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    /**
     * Setter pour la note du contact.
     * @param string $note Étant la nouvelle note du contact.
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    /**
     * Fonction permettant d'ajouter un numéro de téléphone au contact.
     * @param PhoneNumber $phoneNumber Étant le numéro de téléphone.
     */
    public function addPhoneNumber(PhoneNumber $phoneNumber): void
    {
        $this->phoneNumbers[$phoneNumber->getId()] = $phoneNumber;
    }

    /**
     * Fonction permettant d'ajouter une adresse mail au contact.
     * @param MailAddress $mailAddress Étant l'adresse mail.
     */
    public function addMailAddress(MailAddress $mailAddress): void
    {
        $this->mailAddresses[$mailAddress->getId()] = $mailAddress;
    }

    #[ReturnTypeWillChange] public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }
}