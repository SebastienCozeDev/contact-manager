<?php

namespace Php\ContactManager\Utils;

use Exception;
use Faker\Factory;
use Faker\Generator;
use Php\ContactManager\Models\CivilityTitle;
use Php\ContactManager\Models\Contact;

/**
 * Classe GenerateContacts servant à générer des contacts, des numéros de téléphone, des adresses mail.
 */
class GenerateContacts
{
    /**
     * @var Generator Étant le générateur.
     */
    public static Generator $faker;

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
     * Permet de générer un contact avec son identifiant.
     * @param int $id Étant l'identifiant du contact.
     * @return Contact Étant le contact.
     */
    public static function generateContactDataWithId(int $id): Contact
    {
        return new Contact(
            $id,
            self::generateCivilityTitle(),
            self::$faker->lastName(),
            self::$faker->firstName(),
            self::$faker->firstName(),
            self::$faker->companySuffix(),
            '',
            self::$faker->phoneNumber(),
            self::$faker->email(),
            self::$faker->text()
        );
    }

    public static function generateContactWithData(array $data): Contact
    {
        return new Contact(
            $data['id'],
            $data['civilityTitle'],
            $data['lastName'],
            $data['firstName'],
            $data['secondName'],
            $data['company'],
            $data['position'],
            $data['phoneNumber'],
            $data['mailAddress'],
            $data['note']
        );
    }

    /**
     * Permet de générer un tableau de contacts.
     * @param int $nb Étant le nombre de contacts souhaité.
     * @return array Étant le tableau de contacts.
     */
    public static function generateContactData(int $nb = 10): array
    {
        $data = [];
        for ($i = 1; $i <= $nb; $i++) {
            $data[$i] = self::generateContactDataWithId($i);
        }
        return $data;
    }

    /**
     * Permet de générer des contacts et de les stocker dans un fichier.
     * @param string $filename Étant le nom du fichier.
     * @param int $nb Étant le nombre de contacts voulu.
     * @throws Exception
     */
    public static function writeFileContactData(string $filename, int $nb = 10): void
    {
        $filehandler = fopen($filename, 'w');
        if (!$filehandler) {
            throw new Exception(sprintf('[FileAccessError] %s', $filename));
        }
        $data = self::generateContactData($nb);
        fwrite($filehandler, json_encode($data, true));
        fclose($filehandler);
    }

    /**
     * Permet d'écrire dans un fichier des données dans un fichier.
     * @param string $filename Étant le nom du fichier.
     * @param array $data Étant le tableau des données.
     * @throws Exception
     */
    public static function writeFileContactWithData(string $filename, array $data): void
    {
        $filehandler = fopen($filename, 'w');
        if (!$filehandler) {
            throw new Exception(sprintf('[FileAccessError] %s', $filename));
        }
        $json = json_encode($data, true);
        fwrite($filehandler, $json);
        fclose($filehandler);
    }

    /**
     * Permet d'avoir les données d'un fichier pour construire un tableau de contacts, de numéros de téléphone ou d'adresses mail.
     * @param string $filename Étant le nom du fichier.
     * @param string $choice Étant le nom du type d'objet que l'on veut. Il peut être 'Contact', 'PhoneNumber' ou 'MailAddress'.
     * @return array Étant les données voulues.
     * @throws Exception
     */
    public static function readFileData(string $filename, string $choice): array
    {
        $datas = [];
        if (file_exists($filename)) {
            $json = file_get_contents($filename);
        } else {
            throw new Exception(sprintf('[Unable to read file] %s', $filename));
        }
        if (!$json) {
            throw new Exception(sprintf('[File access error] %s', $filename));
        }
        $json_data = json_decode($json, true);
        foreach ($json_data as $data) {
            $datas[$data['id']] = self::generateContactWithData($data);
        }
        return $datas;
    }
}

GenerateContacts::$faker = Factory::create('fr_FR');