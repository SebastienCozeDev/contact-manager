<?php

namespace Php\ContactManager\Models;

use JetBrains\PhpStorm\Internal\TentativeType;
use ReturnTypeWillChange;

/**
 * Classe Contact correspondant à un contact.
 */
class Contact implements \JsonSerializable
{

    /**
     * @var int $id Étant l'identifiant du contact.
     */
    protected int $id;

    protected string $civilityTitle;

    #[ReturnTypeWillChange] public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }
}