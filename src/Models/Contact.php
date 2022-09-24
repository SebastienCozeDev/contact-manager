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
     * @param int $id Étant l'identifiant du contact.
     * @param CivilityTitle $civilityTitle Étant le titre de civilité du contact.
     */
    public function __construct(int $id = 0, CivilityTitle $civilityTitle = CivilityTitle::AUTRE, string $lastName = '', string $firstName = '', string $secondName = '', string $company = '')
    {
        $this->id = $id;
        $this->civilityTitle = $civilityTitle;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->$company = $company;
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

    #[ReturnTypeWillChange] public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }
}