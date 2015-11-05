# Projet casscroute

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
php app/console doctrine:schema:update --dump-sql
### Créer
php app/console doctrine:schema:update --force
