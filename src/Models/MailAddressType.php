<?php

namespace Php\ContactManager\Models;

/**
 * Énumération MailAddressType correspondant au type d'adresse mail du contact.
 */
enum MailAddressType
{

    case PERSONAL;
    case PROFESSIONAL;
    case OTHER;

    public static function doStuff(MailAddressType $mailAddressType): string
    {
        return match ($mailAddressType) {
            MailAddressType::PERSONAL => 'Personnel',
            MailAddressType::PROFESSIONAL => 'Professionnel',
            MailAddressType::OTHER => 'Autre'
        };
    }

}