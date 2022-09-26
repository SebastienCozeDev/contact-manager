<?php

namespace Php\ContactManager\DB;

use Exception;
use Php\ContactManager\Models\Contact;
use Php\ContactManager\Utils\GenerateContacts;

/**
 * Classe DBMapper simulant la base de données.
 */
class DBMapper implements IDBMapper
{

    private const DEFAULT_FILENAME = __DIR__ . "/../../datas/" . 'data.json';

    /**
     * @var IDBMapper $instance Étant l'instance.
     */
    private static IDBMapper $instance;

    /**
     * @var array $datas Étant les données.
     */
    private array $datas;

    /**
     * @var string $filename Étant le nom du fichier.
     */
    private string $filename;

    /**
     * Constructeur de DBMapper.
     * @param string $filename Étant le nom du fichier.
     * @param array $datas Étant les données.
     * @param bool $init Si vrai, alors on lance l'initialisation.
     * @throws Exception
     */
    private function __construct(string $filename, array $datas, bool $init)
    {
        $this->filename = $filename;
        $this->datas = $datas;
        if (count($datas) > 0 || $init) {
            try {
                GenerateContacts::writeFileContactWithData($this->filename, $datas);
            } catch (Exception $e) {
                throw new Exception(sprintf('[FileAccessError] %s', $this->filename));
            }
        }
        try {
            $this->datas =  GenerateContacts::readFileData($this->filename);
        } catch (Exception $e) {
            try {
                GenerateContacts::writeFileContactData($this->filename, 300);
            } catch (Exception $e) {
                throw new Exception(sprintf('[FileAccessError] %s', $this->filename));
            }
            $this->datas = GenerateContacts::readFileData($this->filename);
        }
    }

    /**
     * Permet d'obtenir l'instance.
     * @param string $filename Étant le nom du fichier.
     * @param array $datas Étant les données.
     * @param bool $init Si vrai, alors on lance l'initialisation.
     * @return IDBMapper Étant l'instance.
     * @throws Exception
     */
    public static function getInstance(string $filename = self::DEFAULT_FILENAME, array $datas = [], bool $init = false): IDBMapper
    {
        if (count($datas) > 0 || !isset(self::$instance) || $init) {
            self::$instance = new DBMapper($filename, $datas, $init);
        }
        return self::$instance;
    }

    /**
     * Permet d'avoir l'ordre de tri pour les contacts.
     * @param Contact $a Étant le premier contact.
     * @param Contact $b Étant le second contact.
     * @return int Étant l'entier de tri qui peut être à -1, 0 ou 1.
     */
    public static function sortById(Contact $a, Contact $b): int
    {
        return $a->getId() - $b->getId();
    }

    public function getNextId(): int
    {
        usort($this->datas, [DBMapper::class, 'sortById']);
        $contact = end($this->datas);
        return $contact->getId() + 1;
    }

    /**
     * Permet de lister l'ensemble des contacts.
     * @return array Étant le tableau des contacts.
     */
    function allContacts(): array
    {
        return $this->datas;
    }

    /**
     * Permet de trouver un contact à l'aide de son identifiant.
     * @param int $id Étant son identifiant.
     * @return Contact|false Étant le contact.
     */
    function findContactById(int $id): Contact|false
    {
        foreach ($this->datas as $data) {
            if ($data->getId() === $id)
                return $data;
        }
        return false;
    }

    /**
     * Permet d'insérer un contact.
     * @param Contact $contact Étant le contact.
     * @return Contact|false Étant le contact.
     * @throws Exception
     */
    function insertContact(Contact $contact): Contact|false
    {
        if ($contact->getId() == 0) {
            $contact->setId($this->getNextId());
        }
        $c = $this->findContactById($contact->getId());
        if (!$c) {
            $this->datas[$contact->getId()] = $contact;
            GenerateContacts::writeFileContactWithData($this->filename, $this->datas);
            return $contact;
        }
        return false;
    }

    /**
     * Permet de modifier un contact.
     * @param Contact $contact Étant le contact.
     * @return Contact|false Étant le contact.
     * @throws Exception
     */
    function updateContact(Contact $contact): Contact|false
    {
        $c = $this->findContactById($contact->getId());
        if ($c) {
            $this->datas[$contact->getId()] = $contact;
            GenerateContacts::writeFileContactWithData($this->filename, $this->datas);
            return $contact;
        }
        return false;
    }

    /**
     * Permet de supprimer un contact.
     * @param int $id Étant son identifiant.
     * @return bool Vrai si la suppression a bien eu lieu.
     * @throws Exception
     */
    function deleteContact(int $id): bool
    {
        $p = $this->findContactById($id);
        if ($p) {
            unset($this->datas[$id]);
            GenerateContacts::writeFileContactWithData($this->filename, $this->datas);
            return true;
        }
        return false;
    }

    /**
     * Getter pour le nom du fichier par défaut.
     * @return string Étant le nom du fichier par défaut.
     */
    public static function getDefaultFilename(): string
    {
        return self::DEFAULT_FILENAME;
    }
}