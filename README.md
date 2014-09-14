fphanoit
========

framework mvc php - ORM activerecord - bootstrap

## Instalación

### 

En primer lugar, copie este repo en una carpeta accesible pública en su servidor. 
Las técnicas más comunes son: 
a) descargar y extraer el .zip / .tgz con la mano 
b) clonar el repositorio con git 

```
git clone https://github.com/jhuhandha/fphanoit.git 
```

1. Configurar el mod_rewrite en el archivo php.ini

2. Ejecutar el archivo de base de datos que pueden encontrar en *application/_instalacion*.

3. Cambiar el archivo .htaccess 
```
RewriteBase /php-mvc/
```
Si la carpeta del proyecto se pone en la raiz del www se puede configurar asi
```
RewriteBase /
```
Si usted ha puesto el proyecto en una sub-carpeta, a continuación, poner el nombre de la subcarpeta en la configuracion
```
RewriteBase /sub-folder/
```

4. Editar *application/config/config.php*
```php
define('URL', 'http://127.0.0.1/php-mvc/');
```
Recuerda poner el nombre de la sub-carpeta si es el caso

5. Editar *application/config/config.php*
```php
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'php-mvc');
define('DB_USER', 'root');
define('DB_PASS', '');
```
