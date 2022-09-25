<?php

/**
 * Classe correspondant à un numéro de téléphone.
 */

namespace Php\ContactManager\Models;

class MailAddress extends SpecificInformation
{

    /**
     * @var MailAddressType $type Étant le type de l'adresse mail.
     */
    protected MailAddressType $type;

    /**
     * Constructeur de l'objet MailAddress.
     * @param int $id Étant l'identifiant de l'adresse mail.
     * @param string $information Étant l'adresse mail.
     * @param MailAddressType $type Étant le type d'adresse mail.
     */
    public function __construct(int $id = 0, string $information = '', MailAddressType $type = MailAddressType::OTHER)
    {
        parent::__construct($id, $information);
        $this->type = $type;
    }

    /**
     * Getter pour le type du numéro de téléphone.
     * @return MailAddressType Étant le type du numéro de téléphone.
     */
    public function getType(): MailAddressType
    {
        return $this->type;
    }

    /**
     * Setter pour le numéro de téléphone.
     * @param MailAddressType $type Étant le nouveau type du numéro de téléphone.
     */
    public function setType(MailAddressType $type): void
    {
        $this->type = $type;
    }

    /**
     * Fonction permettant d'avoir l'objet en chaîne de caractères.
     * @return string L'objet en chaîne de caractères.
     */
    public function __toString(): string
    {
        return sprintf('PhoneNumber #%d : [number : %s, type : %s]', $this->id, $this->information, MailAddressType::doStuff($this->type));
    }

}
