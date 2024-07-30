<h1 align="center" style="font-weight: bold;">API Auth Middleware 💻</h1>

[![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg)](https://GitHub.com/Naereen/StrapDown.js/graphs/commit-activity)

<p align="center">
 <a href="#tech">Technologies</a> • 
 <a href="#started">Getting Started</a> • 
  <a href="#routes">API Endpoints</a> •
  <a href="#contacts">Contacts</a>
</p>

<p align="center">
    <b>This API is designed to practice authentication and authorization using Laravel Sanctum. It also involved studying middlewares and creating one with a global Gate, accompanied by a Policy.</b>
</p>

<h2 id="tech">💻 Technologies</h2>

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![Git](https://img.shields.io/badge/git-%23F05033.svg?style=for-the-badge&logo=git&logoColor=white)
![Postman](https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white)
![Postgres](https://img.shields.io/badge/postgres-%23316192.svg?style=for-the-badge&logo=postgresql&logoColor=white)

OBS: The database used is PostgreSQL but feel free to uso anoher one.

<h2 id="started">🚀 Getting started</h2>

<h3>Prerequisites</h3>

- [**PHP** version **8** or superior](https://www.php.net/);
- [**Laravel 10** or superior](https://laravel.com/);
- [**GIT 2** os superior](https://github.com);
- [**Postman** version **11**](https://www.postman.com/);
- Any database;

<h3>Cloning</h3>

How to clone your project

```bash
git clone your-project-url-in-github
```

<h3>Config .env variables</h2>

Use the `.env.example` as reference to create your configuration file `.env` with your AWS Credentials

```bash
...
```

<h3>Install Composer</h3>

After clone de project you will need to install composer:
```bash
composer install
```

<h3>Starting</h3>

1° First you will run the project using this command
```bash
php artisan serve
```

2° To send requests use the Postman that have a complete documentation abount this API and already have all requests but you need to make login to use the request's remaing because the login will generate the bearer token  to include in authorization header in Postman. The token expire in 1 hour so when this hapens you need to do login again to generate a new token.

3° To continue using this API I realy recomend use the Postman documentation to read more about each request and how they work. In this link (link postman documentation) you will find especifications like JSONs examples.

<h2 id="routes">📍 API Endpoints</h2>

(Building...)
​
| route               | description                                          
|----------------------|-----------------------------------------------------
| <kbd>GET /authenticate</kbd>     | retrieves user info see [response details](#get-auth-detail)
| <kbd>POST /authenticate</kbd>     | authenticate user into the api see [request details](#post-auth-detail)

<h3 id="get-auth-detail">GET /authenticate</h3>

**RESPONSE**
```json
{
  "name": "Fulano Detal",
  "age": 20,
  "email": "fulano@gmail.com"
}
```

<h3 id="post-auth-detail">POST /authenticate</h3>

**REQUEST**
```json
{
  "username": "fulanodetal",
  "password": "password"
}
```

**RESPONSE**
```json
{
  "token": "OwoMRHsaQwyAgVoc3OXmL1JhMVUYXGGBbCTK0GBgiYitwQwjf0gVoBmkbuyy0pSi"
}
```

<h2 id="contacts">📫 Contacts</h2>

You can contact me through LinkedIn (www.linkedin.com/in/matheus-eufrásio-51678922b) or GitHub (https://github.com/m-eufrasio) wheter you have any questions or another thing. This project is only to study and is not oficially open to pull requests but is not a rule.


