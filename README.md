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
- [Conception ](https://lucid.app/lucidchart/478fdfb6-5478-4a05-926c-318f124f4af9/edit?viewport_loc=941%2C-660%2C5167%2C2250%2C0_0&invitationId=inv_5c766b3f-88f1-4944-9342-e92a4ea119d5) -  Class Diagram Und use case Diagram
- [Canva ](https://www.canva.com/design/DAGlrRZR8v8/WNMtn16agEkvicRNXr9OXg/edit?utm_content=DAGlrRZR8v8&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton) -  Présentation du projet




