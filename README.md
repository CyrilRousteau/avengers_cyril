# avengers_cyril

Ce projet utilise le framework Symfony et l'ORM Doctrine pour la gestion de la base de données. Voici les instructions pour initialiser le projet, démarrer le serveur de développement et charger des données de test avec Doctrine DataFixtures.

## Prérequis

- PHP 7.4 ou supérieur
- Composer
- Symfony CLI
- Une base de données MySQL ou PostgreSQL

## Installation

Clonez le dépôt et installez les dépendances :

```bash
git clone https://github.com/CyrilRousteau/avengers_cyril.git
cd avengers_cyril
composer install

## Configuration de la base de données

# Exemple pour MySQL
DATABASE_URL="mysql://username:password@localhost/nom_de_la_base_de_donnees"

# Exemple pour PostgreSQL
DATABASE_URL="postgresql://username:password@localhost/nom_de_la_base_de_donnees?serverVersion=13&charset=utf8"

## Initialisation de Doctrine
# Crée la base de données si elle n'existe pas
php bin/console doctrine:database:create

# Exécute les migrations pour créer les tables
php bin/console doctrine:migrations:migrate

## Démarrage du serveur de développement

symfony server:start

## Chargement des données de test avec DataFixtures

php bin/console doctrine:fixtures:load

## récupérer toutes les routes d'un projet 
php bin/console debug:router
