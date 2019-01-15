## Requerimientos https://laravel.com/docs/5.7#server-requirements
PHP >= 7
MYSQL >= 5.5

## Instalacion
Se debe crear la base de datos MYSQL y configurar los accesos de la applicacion en el archivo .env 
Una vez clonado el repositorio en un ambiente con los requerimientos y configurada la base de datos se ejecutar los sigientes comandos:

-composer update

-php artisan migrate

-php artisan db:seed

-php artisan passport:install

-php artisan vendor:publish  (seleccionando "Provider: Barryvdh\DomPDF\ServiceProvider" )


