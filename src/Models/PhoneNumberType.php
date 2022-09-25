<?php

namespace Php\ContactManager\Models;

/**
 * Énumération PhoneNumberType correspondant au type de numéro de téléphone du contact.
 */
enum PhoneNumberType
{

    case MOBILE;
    case HOME;
    case OFFICE;
    case MAIN;
    case OFFICE_FAX;
    case HOME_FAX;
    case OTHER;

    public static function doStuff(PhoneNumberType $phoneNumberType): string
    {
        return match ($phoneNumberType) {
            PhoneNumberType::MOBILE => 'Mobile',
            PhoneNumberType::HOME => 'Domicile',
            PhoneNumberType::OFFICE => 'Bureau',
            PhoneNumberType::MAIN => 'Principal',
            PhoneNumberType::OFFICE_FAX => 'Fax bureau',
            PhoneNumberType::HOME_FAX => 'Fax domicile',
            PhoneNumberType::OTHER => 'Autre'
        };
    }

}