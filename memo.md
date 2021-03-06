# Mémo Symfony

Un mémo des quelques commandes utiles pour un projet Symfony

## Installer les dépendances
```
composer install
```

## Mettre à jour les dépendances
```
composer update
```

## Lancer le serveur
```
php app/console server:run
```

## Lancer le serveur en mode ProductBundle
```
php app/console server:run --env=prod
```

## Générer un Bundle
```
php app/console generate:bundle --namespace=Author/ProductBundle --format=yml
```
Puis suivre l'assistant

## Créer la base de donnée
```
php app/console doctrine:database:create
```

## Gérérer une entité
```
php app/console doctrine:generate:entity
```
Puis suivre l'assitant

## Gestion création table
### Afficher ce qui va être créé
```
php app/console doctrine:schema:update --dump-sql
```
### Créer
```
php app/console doctrine:schema:update --force
```

# Executer les fixtures (jeu de test)
```
php app/console doctrine:fixtures:load
```

# Ajout bundle externe
```
php composer.phar require friendsofsymfony/user-bundle "~2.0@dev"
```
Modifier AppKernel.php pour ajouter le nouveau bundle dans l'array bundles (méthode registerBundles)

# Créer un formulaire
```
php app/console doctrine:generate:form CasscrouteBlogBundle:Post
```
