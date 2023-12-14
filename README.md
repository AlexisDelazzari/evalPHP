# League of Legends Manager

Bienvenue dans le League of Legends Manager, une plateforme web innovante développée avec le framework PHP Symfony, qui offre une expérience de gestion de champions unique inspirée du jeu légendaire League of Legends.

## Table des Matières

1. [Description du Projet](#description-du-projet)
2. [Fonctionnalités Principales](#fonctionnalités-principales)
3. [Utilisation](#utilisation)
4. [Améliorations Futures](#améliorations-futures)


## Description du Projet

Le League of Legends Manager va au-delà d'une simple simulation en offrant une expérience interactive de création et de gestion de champions. Les utilisateurs peuvent explorer l'univers riche de League of Legends, générer des compositions uniques, et partager leurs créations avec une communauté mondiale de joueurs.

## Fonctionnalités Principales

### 1. Génération Aléatoire de Champions

Les joueurs peuvent expérimenter avec la création de champions en combinant des caractéristiques aléatoires telles que les runes, les summoners et les items.

### 2. Sauvegarde de Champions

La fonction de sauvegarde permet aux utilisateurs de préserver leurs champions préférés, créant ainsi une galerie personnalisée de compositions uniques.

### 3. Gestion Administrateur

Le compte administrateur offre un contrôle complet sur l'ensemble du système, permettant des ajustements fins tels que l'ajout, la modification et la suppression de champions, de runes et de l'ensemble des entités présent dans le jeu.

### 4. Système de Traduction

Le site est disponible en plusieurs langues, avec un système de traduction complet en français, anglais et d'autres langues à venir.

### 5. Système de Connexion Sécurisé

Une authentification robuste assure la sécurité des comptes utilisateurs, avec une protection de route et des pages personnalisées pour une expérience utilisateur fluide.

##  Utilisation

veuillez suivre les étapes suivantes pour utiliser l'application :

1. Téléchargez le projet en cliquant sur le bouton vert `Code` en haut à droite de la page, puis en cliquant sur `Download ZIP`.
2. Décompressez le fichier ZIP dans le dossier www de votre serveur local (wamp, xampp, etc.) pour l'exemple le dossier utilisé sera eval.

Pour utiliser l'application, vous disposer de deux options :

1. Vous pouvez vous connecter avec un compte administrateur existant, en utilisant les identifiants suivants :

    - **Nom d'utilisateur** : adelazzari8@gmail.com
    - **Mot de passe** : root

2. Vous pouvez vous connecter avec un compte utilisateur existant, en utilisant les identifiants suivants :

    - **Nom d'utilisateur** : test@gmail.com
    - **Mot de passe** : root

Avec ces comptes, vous pouvez explorer les fonctionnalités de l'application, créer des champions, les sauvegarder, et les partager avec la communauté.
Vous aller devoir également créer une base de données locale pour pouvoir utiliser l'application. Pour cela, vous pouvez suivre les étapes suivantes :

1. Ouvrez le fichier `.env.local` et modifiez la ligne suivante :

    ```
    DATABASE_URL=mysql://root:root@127.0.0.1:3306/evalphp?serverVersion=8
    ```
    Remplacez `root:root` par vos identifiants de connexion à votre base de données locale.

2. Ouvrez un terminal et exécutez les commandes suivantes :

    ```
    composer install
    php bin/console doctrine:database:create
    php bin/console doctrine:migrations:migrate
    php bin/console doctrine:fixtures:load
    ```
    La première commande va installer les dépendances du projet, la deuxième va créer la base de données, la troisième va créer les tables de la base de données, et la dernière va insérer des données de test dans la base de données.
3. Vous pouvez maintenant lancer l'application via wamp par exemple.
* Vous pouvez maintenant accéder à l'application en ouvrant votre navigateur et en entrant l'adresse suivante : `http://localhost/eval/public/application`

## Améliorations Futures

- Amélioration des formulaire car actuellement on peut mettre un peu n'importe quoi dans les entités.
- Ajout des améliorations de design.
- Les traductions ne sont pas toutes bien faites.
- Séparation des fichiers CSS HTML et JS (car la c'est moche dsl).
- Optimisation du code le controlleur admin est infame tout comme son htlm divisé en component par entity aurait été mieux.
- Faire un système de pagination pour l'affichage des entites car la on charge comme des sauvages laisse tomber si on a 1000 champions.
- Ajout d'un mot de passe oublié.
- Les filtres peuvent être améliorés car les données sont chargées en une fois et ensuite filtrées + les filtres sont écrits en dur dans le code.
- Traduire les items et les messages d'erreur. + ajout de tous les items. + les items actuel sont faux pas à jour et les images sont pas les bonnes.

---

© 2023 League of Legends Manager. Tous droits réservés.
