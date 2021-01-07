
## Herramientas necesarias

Installar Docker

## .env
Crear nuevo archivo .env y copiar el contenido del archivo .env.example. 


## Crear contenedores docker-compose

Ejecute  ```docker-compose build``` para levantar los contenedores del proyecto 

## Uso con Docker

Abra el contenedor de la aplicacion e instale todas las dependencias ejecutando: 
```
docker-compose exec app sh
```

Ejecute dentro del contenedor app 
```
composer install
```

Crear nueva key dentro del contenedor app 
```
php artisan key:generate
```

Luego ir a `http://localhost:8084/` donde aparecera el formulario para realizar las búsqueda de países

## Ejecución de contenedor mariadb 
Ejecute ```docker-compose exec mariadb bash``` para entrar al contenedor

Dentro del contenedor, inicie sesión en la cuenta administrativa root de MySQL:

```mysql -u root -p```

Se le solicitará la contraseña que estableció para la cuenta root de MySQL durante la instalación en el archivo docker-compose.
user: root, password:qweasd123

Comience revisando la base de datos llamada game, que definió en el archivo docker-compose. Ejecute el comando ```show databases``` para verificar las bases de datos existentes:

A continuación, cree la cuenta de usuario que tendrá permisos de acceso a esta base de datos.

```GRANT ALL ON laravel.* TO 'root'@'%' IDENTIFIED BY 'qweasd123'```

Elimine los privilegios para notificar los cambios al servidor MySQL:

```FLUSH PRIVILEGES;```

Cierre MySQL:

```EXIT;```

Por último, cierre el contenedor:

##Migrar datos
Pruebe la conexión con MySQL ejecutando el comando Laravel ```php artisan migrate```, dentro del contenedor app y se creara dentro de la base de datos llamada game, la tabla countries


## Ejecutar seeding

Abra el contenedor de la aplicación ``` docker-compose exec app sh``` y corras los seed para cargar los datos de prueba ejecutando: 
```php artisan db:seed``` o ```php artisan db:seed --class=CountriesSeeder```, verifique que los datos se almacenaron en la tabla countries de la base de datos llamada game en el contenedor mariadb .

## Ejecución de pruebas
Instale las dependencias si no lo ha hecho anteriormente:

```
composer install
```


## Ejecutar todas las pruebas PHPUnit 
Entrar al contenedor de la aplicacion ejecutando
```
docker-compose exec app sh
```
luego ejecute ``` ./vendor/bin/phpunit ``` para correr todas la pruebas que se encuentran dentro de Tests\Unit\CountryTest;

Puede filtrar cada prueba pasando el nombre de la misma, al parametro --filter, ejemplo: 

```
./vendor/bin/phpunit  --filter search_no_existing_countries
```

Detener a los contenedores:
```
docker-compose stop
```

Dando de baja a los contenedores: 

```
docker-compose down
```

