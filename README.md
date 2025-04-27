# Loughat - Application E-Learning


## Installation

Cloner le projet
```git clone 
https://github.com/kardasch404/Loughat.git
```

Accéder au dossier du projet ...

```
cd Loughat
```
Installer les dépendances  ...

```
composer install
npm install && npm run dev
```
Copier le fichier .env.example en .env et configurer la base de données  ...

```
cp .env.example .env
```
Modifier .env

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=loughat
DB_USERNAME=root
DB_PASSWORD=
```
Générer la clé d'application

```
php artisan key:generate
```
Démarrer le serveur

```
php artisan serve
```
##  Liens utiles


- [Jira](https://kardachezakaria.atlassian.net/jira/software/projects/LOUG/boards/93?sprintStarted=true&atlOrigin=eyJpIjoiYTRhNGIxMjgyNWQ2NDYwNjg5NzQ4MmViMTY2NjkyOWQiLCJwIjoiaiJ9) -  Gestion du projet
- [Conception ](https://lucid.app/lucidchart/b3753de5-4bad-4ac5-8707-0455f3ca2a26/edit?viewport_loc=-2369%2C-2716%2C5213%2C2270%2C0_0&invitationId=inv_8f578cc9-66fb-4dca-873a-aabd78ca43ab) -  Class Diagram Und use case Diagram
- [Canva ]() -  Présentation du projet




