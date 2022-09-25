<?php

/**
 * Classe correspondant à un numéro de téléphone.
 */

namespace Php\ContactManager\Models;

class PhoneNumber extends SpecificInformation
{

    /**
     * @var PhoneNumberType $type Étant le type du numéro de téléphone.
     */
    protected PhoneNumberType $type;

    /**
     * Constructeur de l'objet PhoneNumber.
     * @param int $id Étant l'identifiant du numéro de téléphone.
     * @param string $information Étant le numéro de téléphone.
     * @param PhoneNumberType $type Étant le type du numéro de téléphone.
     */
    public function __construct(int $id = 0, string $information = '', PhoneNumberType $type = PhoneNumberType::OTHER)
    {
        parent::__construct($id, $information);
        $this->type = $type;
    }

    /**
     * Getter pour le type du numéro de téléphone.
     * @return PhoneNumberType Étant le type du numéro de téléphone.
     */
    public function getType(): PhoneNumberType
    {
        return $this->type;
    }

    /**
     * Setter pour le numéro de téléphone.
     * @param PhoneNumberType $type Étant le nouveau type du numéro de téléphone.
     */
    public function setType(PhoneNumberType $type): void
    {
        $this->type = $type;
    }

    /**
     * Fonction permettant d'avoir l'objet en chaîne de caractères.
     * @return string L'objet en chaîne de caractères.
     */
    public function __toString(): string
    {
        return sprintf('PhoneNumber #%d : [number : %s, type : %s]', $this->id, $this->information, PhoneNumberType::doStuff($this->type));
    }

}
