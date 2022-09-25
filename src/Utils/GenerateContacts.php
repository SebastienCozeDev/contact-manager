<?php

namespace Php\ContactManager\Utils;

use Exception;
use Faker\Generator;
use Php\ContactManager\Models\CivilityTitle;
use Php\ContactManager\Models\Contact;
use Php\ContactManager\Models\PhoneNumber;
use Php\ContactManager\Models\PhoneNumberType;

/**
 * Classe GenerateContacts servant à générer des contacts, des numéros de téléphone, des adresses mail.
 */
class GenerateContacts
{
    /**
     * @var Generator Étant le générateur.
     */
    protected static Generator $faker;

    /**
     * Permet de générer un titre de civilité.
     * @return CivilityTitle Étant le titre de civilité.
     */
    public static function generateCivilityTitle(): CivilityTitle
    {
        if (self::$faker->boolean()) {
            return CivilityTitle::MADAME;
        } elseif (self::$faker->boolean()) {
            return CivilityTitle::MONSIEUR;
        } elseif (self::$faker->boolean()) {
            return CivilityTitle::MAITRE;
        } elseif (self::$faker->boolean()) {
            return CivilityTitle::DOCTEUR;
        } elseif (self::$faker->boolean()) {
            return CivilityTitle::DOCTEURE;
        } else {
            return CivilityTitle::AUTRE;
        }
    }

    /**
     * Permet de générer un type de numéro de téléphone.
     * @return PhoneNumberType Étant le type.
     */
    public static function generatePhoneNumberType(): PhoneNumberType
    {
        if (self::$faker->boolean()) {
            return PhoneNumberType::HOME;
        } elseif (self::$faker->boolean()) {
            return PhoneNumberType::HOME_FAX;
        } elseif (self::$faker->boolean()) {
            return PhoneNumberType::MAIN;
        } elseif (self::$faker->boolean()) {
            return PhoneNumberType::OFFICE;
        } elseif (self::$faker->boolean()) {
            return PhoneNumberType::OFFICE_FAX;
        } elseif (self::$faker->boolean()) {
            return PhoneNumberType::MOBILE;
        } else {
            return PhoneNumberType::OTHER;
        }
    }

    /**
     * Permet de générer un numéro de téléphone.
     * @param int $id Étant son identifiant.
     * @return PhoneNumber Étant le numéro de téléphone généré.
     */
    public static function generatePhoneNumberDataWithId(int $id): PhoneNumber
    {
        return new PhoneNumber($id, self::$faker->phoneNumber(), self::generatePhoneNumberType());
    }

    /**
     * Permet de générer un tableau de numéro de téléphone.
     * @param int $nb Étant le nombre de numéros de téléphone souhaité.
     * @return array Étant le tableau de numéros de téléphone.
     */
    public static function generatePhoneNumberData(int $nb = 10): array
    {
        $data = [];
        for ($i = 1; $i <= $nb; $i++) {
            $data[$i] = self::generatePhoneNumberDataWithId($i);
        }
        return $data;
    }

    /**
     * Permet de générer un numéro de téléphone à l'aide d'un tableau de données.
     * @param array $data Étant le tableau de données.
     * @return PhoneNumber Étant le numéro de téléphone généré.
     */
    public static function generatePhoneNumberWithData(array $data): PhoneNumber
    {
        return new PhoneNumber($data['id'], $data['phoneNumber'], $data['type']);
    }

    /**
     * Permet d'écrire dans un fichier le résultat d'une génération de numéro de téléphone.
     * @param string $filename Étant le nom du fichier.
     * @param int $nb Étant le nombre de numéros de téléphone voulu.
     * @throws Exception
     */
    public static function writeFilePhoneNumberData(string $filename, int $nb = 10): void
    {
        $filehandler = fopen($filename, 'w');
        if (!$filehandler) {
            throw new Exception(sprintf('[File access error] %s', $filename));
        }
        $data = self::generatePhoneNumberData($nb);
        fwrite($filehandler, json_encode($data, true));
        fclose($filehandler);
    }

    /**
     * Permet d'écrire dans un fichier des données dans un fichier.
     * @param string $filename Étant le nom du fichier.
     * @param array $data Étant le tableau des données.
     * @throws Exception
     */
    public static function writeFileWithData(string $filename, array $data): void
    {
        $filehandler = fopen($filename, 'w');
        if (!$filehandler) {
            throw new Exception(sprintf('[File access error] %s', $filename));
        }
        $json = json_encode($data, true);
        fwrite($filehandler, $json);
        fclose($filehandler);
    }

    public static function readFileData(string $filename, string $choice)
    {

    }

    public static function generateContactDataWithId(int $id): Contact
    {
        return new Contact(
            $id,
            self::generateCivilityTitle(),
            self::$faker->lastName(),
            self::$faker->firstName(),
            self::$faker->firstName(),
            self::$faker->companySuffix(),
            ''
        );
    }
}