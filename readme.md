# Dockeriser le container
    docker compose build
    docker compose up

# Se connecter dans le container (['container_name' => 'damoiseaux_symfony])
    docker exec -it [container_name] bash

# Créer le projet Symfony ( attention au Vhost si vous n'utilisez pas project comme nom) [optionnel]
    composer create-project symfony/skeleton:"6.3.*" project 
    composer create-project symfony/skeleton:"7.0.*" project 

# Se déplacer dans le dossier project
    cd app

# Créer le fichier .env ('touch .env')
    APP_ENV=dev
    APP_SECRET=db834c6acfe073895a66af3fe0d29c9e

    DATABASE_URL="mysql://root:@db_damoiseaux:3306/damoiseaux_symfony?serverVersion=8&charset=utf8mb4"    

# Installer les dépendances du projet
    composer install

# Installer les dépendances pour la base de donnée [optionnel]
    composer require symfony/orm-pack
    composer require --dev symfony/maker-bundle
    composer require security ( if using symfony console make:user)

# Modifier le fichier .env pour mettre à jour la connexion [optionnel]
    Defaut : DATABASE_URL="mysql://root:@tutorial_db_symfony:3306/tutorial?serverVersion=8&charset=utf8mb4"

# Créer la base de donnée avec doctrine 
    php bin/console doctrine:database:create


# Localhost 8880 -- Pour PHPMyAdmin
# Localhost 8899 -- Pour l'application