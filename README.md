# Installation du projet

Récupérer le projet via git : 
https://github.com/jmillot33/DernierCri.git

## Technologies & Environnement
- Laravel v8.62.0
- PHP v7.3.31
- Bootstrap v4.6.0

## Fonctionnalités

Lecture d'un flux de 20 articles (si le flux en possède moins, le nombre d'articles maximal est recalculé )

Url utilisée : 
- http://127.0.0.1:8000/ (sur XAMPP) pour la page d'accueil
- http://127.0.0.1:8000/news/{PARAMETRE} pour l'affichage d'un article en particulier
- Mise en place d'une sécruité : Si le parametre entré pour l'affichage d'un article n'est pas numérique ni ne correspond pas à un article récupéré, l'utilisateur est redirigé vers la page d'accueil.


Utilisation de React pour le front
-> Récupération des données en POST via axios



## Liste des commandes pour la création du projet

- composer require laravel/ui.
- php artisan ui react
- npm install
- npm install axios (Librairie facilitant les requetes HTTP/API)
- npm run dev (afin de compiler)

## Evolutions
- Passer le menu en React
- Traduire la date de publication de l'article
- Ajouter un message d'erreur au bout de X temps si l'on arrive pas à charger le flux donné


##Rendu

![Accueil](/public/images/home.png?raw=true "Accueil")

![Single Post](/public/images/single-post.png?raw=true "Single Post")