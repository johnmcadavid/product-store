## PRUEBA TÉCNICA PHP
## Konecta

## Instrucciones de Instalación

Repositorio:
https://github.com/johnmcadavid/product-store.git

1.	Clonar el repositorio
git clone https://github.com/johnmcadavid/product-store.git

2.	Ingresar a la carpeta generada y ejecutar el comando:
composer install

3.	Renombrar o copiar el archivo .env.example a .env. 
Crear una base de datos MySql e ingresar su nombre en el archivo .env en la variable DB_DATABASE
Nota: si algunos de los demás datos de credenciales y servidor son diferentes también cambiarlos.

4.	Ejecutar el comando 
php artisan key:generate

5.	Ejecutar el comando 
php artisan migrate 

6.	Ejecutar el siguiente comando para iniciar el servidor
php artisan serve 

7.	Ingresar a la aplicación
Ir al link de Login ubicado en la parte superior derecha e ingresa los siguientes datos:
Email: admin@mail.com
Password: Test123*	

O en su defecto pueden registrarse y crear un nuevo usuario para ingresar.


## Versión PHP
Este código se ejecutó y probó en la versión de PHP 8.2.0, aunque también debería funcionar en cualquier versión de PHP 8 y en PHP 7.
