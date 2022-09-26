<?php

/**
 * Ce script sert à vérifier que le code de notre modèle et de notre simulation de base de données fonctionnent indépendamment de notre application web.
 */

use Php\ContactManager\DB\DBMapper;
use Php\ContactManager\Models\CivilityTitle;
use Php\ContactManager\Models\Contact;

require_once("vendor/autoload.php");

try {
    $bd = DBMapper::getInstance();
    $contacts = $bd->allContacts();
    for ($i = 1; $i < count($contacts); $i++) {
        print($contacts[$i]->getId()." - ".$contacts[$i]->getLastName().PHP_EOL);
    }
} catch (Exception $e) {
    print(sprintf('[Exception] %s', $e));
}