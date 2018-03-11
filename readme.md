## Simple Blog

<p align="center">

[![Build Status](https://travis-ci.org/LyubomyrPlotnikov/blog.svg?branch=develop)](https://travis-ci.org/LyubomyrPlotnikov/blog)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/LyubomyrPlotnikov/blog/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/LyubomyrPlotnikov/blog/?branch=develop)
</p>

## Installation
To run the project you will need to install Docker. To do this please follow instruction on official docker site.
[Get started with Docker](https://docs.docker.com/get-started/).

After docker is installed you run the project with the following command:

`docker-compose up -d`

The command above will build containers for you. After that, you will need to perform few additional steps
to access your application. 

* Create `.env` file from `.env.example` in root folder.
* Add `blog.local` domain to you `hosts` file. On windows `%SystemRoot
\System32\drivers\etc%` On *nix systems `/etc/hosts`.

Run following commands:

Install dependencies:

`docker-compose exec -T php-fpm composer install`

Generate app key:

`docker-compose exec -T php-fpm php artisan key:generate`

Run migration:

`ocker-compose exec -T php-fpm php artisan migrate --seed`

At this point, your application should be accessible via `blog.local` domain.

## Configuration

To log in as an administrator you can use default credentials which can be found in `config/admin.php` file. 
If you would like to change them you can do that by specifying a following keys in your `.env` file:

```
ADMIN_NAME=Admin Name
ADMIN_EMAIL=admin@example.com
ADMIN_PASSWORD=password
```

After that you will to re-run migration to apply changes.`

## License

The Simple Blog is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
