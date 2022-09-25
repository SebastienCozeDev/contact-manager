<?php

namespace Php\ContactManager\Models;

/**
 * Classe SpecificInformation correspondant à une information spécifique comme un numéro de téléphone ou une adresse mail.
 */
abstract class SpecificInformation
{
    /**
     * @var int $id Étant l'identifiant de l'information.
     */
    protected int $id;

    /**
     * @var string $information Étant l'information en elle-même.
     */
    protected string $information;

    /**
     * Constructeur de la classe.
     * @param int $id Étant l'identifiant de l'information.
     * @param string $information Étant l'information en elle-même.
     */
    public function __construct(int $id = 0, string $information = '')
    {
        $this->id = $id;
        $this->information = $information;
    }

    /**
     * Getter pour l'identifiant de l'information.
     * @return int Étant l'identifiant de l'information.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Getter pour l'information en elle-même.
     * @return string Étant l'information en elle-même.
     */
    public function getInformation(): string
    {
        return $this->information;
    }

    /**
     * Setter pour l'identifiant de l'information.
     * @param int $id Étant le nouvel identifiant de l'information.
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Setter pour la nouvelle information.
     * @param string $information Étant la nouvelle information.
     */
    public function setInformation(string $information): void
    {
        $this->information = $information;
    }

    /**
     * Fonction permettant d'avoir l'objet sous forme de chaîne de caractères.
     * @return string L'objet en chaîne de caractères.
     */
    public abstract function __toString(): string;

}