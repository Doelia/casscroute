# Projet casscroute

## Utilisation

Une version de démonstration est en ligne :  
http://casscroute.doelia.fr

- *Compte administrateur* : admin, mot de passe admin
- *Compte utilisateur* : user, mot de passe user

## Fonctionnalités

- Visualisation des posts
    - Interprétation du langage markdown
- Système de pagignation complexe
- Connexion / Inscription
- Droits admin :
    - Création / Édition / Suppresion des articles
- Pages d'erreurs personnalisées (mode prod uniquement)
- Datas Fixtures pour les jeux de tests

## Techonologie utilisées
- Framework Synfony
    - Bundle *Fosuser* pour la gestion des utilisateurs
    - Bundle *Data fixtures*
    - Bundle *knp-markdown-bundle* pour l'interprétation du Markdown
- Framework CSS [Semantic UI](http://semantic-ui.com/)
- Librarie [Jquery](https://jquery.com/)

## Configuration et installation

Dump SQL disponible :

Cloner le projet :
```
git clone https://github.com/Doelia/casscroute
cd casscroute
```

Installer les dépendances :
```
composer install
```

Modifier et adapter la configuration SQL :
```
nano app/config/parameters.yml
```

Regénérer les fixtures :
```
php app/console doctrine:fixtures:load
```

Lancer le serveur en mode **production** :
```
php app/console server:run --env=prod
```
