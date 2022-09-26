# Contact Manager

## Présentation du projet

Le projet consiste en la conception d'un gestionnaire de contacts. Chaque contact peut avoir :

- Un identifiant obligatoire. L'utilisateur n'a pas connaissance de cette donnée.
- Un titre de civilité.
- Un nom de famille
- Un premier prénom.
- Un second prénom.
- Une organisation.
- Un poste dans cette organisation. Cette donnée ne peut pas exister si le contact n'a pas d'organisation.
- Un numéro de téléphone.
- Une adresse mail.
- Une note.

## Dépendances utilisées

### Utilisées pour la production

- ``eftec/bladeone`` servant à faire nos vues.
- ``miladrahimi/phprouter`` servant à aiguiller les requêtes du client vers le bon traitement.
- ``laminas/laminas-diactoros`` servant à mettre en forme les requêtes et les réponses échangées entre le client et le serveur.

### Utilisées pour le développement

- ``fakerphp/faker`` servant à construire des jeux de données aléatoires afin de pouvoir tester le bon fonctionnement de l'application.
- ``phpunit/phpunit`` servant à faire des tests unitaires.

### Branches

- ``main`` étant l'application web en production.
- ``stage`` étant l'intermédiaire entre l'application en production et celle en développement.
- ``dev`` étant l'application en développement.

### Arborescence du projet

- [console](console) étant le répertoire qui comporte les scripts pouvant être utile côté serveur.
- [datas](datas) étant le répertoire qui comporte les données de l'application web tel que les contacts, les organisations, les numéros de téléphone, les adresses mail, etc.
- [public](public) étant le répertoire où l'on trouve le router et les fichiers tels que les fichiers CSS, JavaScript, les images, vidéos, etc.
- [src](src) étant le répertoire source de l'application web.
- [tests](tests) étant le répertoire qui comporte les tests unitaires.
- [vendor](vendor) étant le repertoire qui comporte les dépendances utilisées.
- [views](views) étant le répertoire où sont stocké nos vues.
- [composer.json](composer.json) étant le fichier où est répertorié des informations utiles pour la commande ``composer``.
- [README.md](README.md) étant le fichier qui décrit le projet.