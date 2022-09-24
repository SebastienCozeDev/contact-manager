<?php

namespace Php\ContactManager\Models;

/**
 * Énumération CivilityTitle correspondant au titre de civilité du contact.
 */
enum CivilityTitle {

    case MADAME;
    case MONSIEUR;
    case MAITRE;
    case DOCTEUR;
    case DOCTEURE;
    case AUTRE;

    public function doStuff(CivilityTitle $civilityTitle): string
    {
        return match ($civilityTitle) {
            CivilityTitle::MADAME => 'Madame',
            CivilityTitle::MONSIEUR => 'Monsieur',
            CivilityTitle::MAITRE => 'Maître',
            CivilityTitle::DOCTEUR => 'Docteur',
            CivilityTitle::DOCTEURE => 'Docteure',
            CivilityTitle::AUTRE => 'Autre'
        };
    }

}