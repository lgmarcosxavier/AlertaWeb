# Sistema Alerta

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible, and secure. 
More information can be found at the [official site](http://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the 
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/). 

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!
The user guide updating and deployment is a bit awkward at the moment, but we are working on it!

## Repository Management

We use Github issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script. 
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.2 or higher is required, with the following extensions installed: 

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

## Conocer ubicación
_Ver siguiente [enlace](https://www.coordenadas-gps.com/)._

## Comandos
Desplegar aplicación
```
php spark serve
```
Migraciones
```
php spark migrate:create [filename]
php spark migrate
php spark migrate:rollback
php spark migrate:refresh
php spark migrate:status
```
Seeders
```
php spark db:seed NombreSeeder
```

## Usuario administrador
```
admin@admin.com
admin
```

## Historial versiones

**14/09/2020**
- Instalación limpia del proyecto, con el comando:
```
composer create-project codeigniter4/appstarter sistemaAlerta
```

**30/09/2020**
- Creada migraciones de las siguientes tablas:
__Rol__,
__Usuario__,
__Estado__,
__TelefonoUsuario__,
__UsuarioConfianza__,
__ContactoEmergencia__,
__Telefono__,
__Departamento__,
__Municipio__,
__TipoAlerta__,
__Alerta__,
__NotificacionAlerta__,
__Sancion__.

**01/10/2020**
- Se ha empezado la parta gráfica del sistema. Ver [plantilla](https://github.com/KhidirDotID/stisla-codeigniter).
- Demostración consulta departamentos y municipios.

**02/10/2020**
- Implementado login.
- Mejorada vista login, para el diseño de la ola, ver [generador](https://getwaves.io/).
- La ruta por defecto se redireccionará al login.

**03/10/2020**
- Agregada login, en api rest.

**05/10/2020**
- Se ha actualizado la base de datos, realizada migración para la tabla __mensajes_personalizados__.
- Se ha agregado la consulta de tipo de alertas.
- Agregada funcionalidad para registrar/editar/eliminar tipo de alerta.

**06/10/2020**
- Se ha creado la clase Seeder para los roles.
- Se ha creado la clase Seeder para el usuario administrador.
- Agregada registrar usuario administrador siguiente buenas prácicas de validaión. Ver [siguiente enlace](https://iniblog.xyz/blogpost/article/81/form-validation-example).
- Al consultar usuarios, no aparecerá el botón de elimnar usuario, del que se encuentra logueado.

**09/10/2020**
- Cambiada respuesta del login de la api rest.
- Realizado método api rest para el registro de usuarios.
- Realizado método api rest para actualizar la información del usuario.
- Realizado método api rest para conocer las sanciones realizadas al usuario.
- Realizado método api rest para recupera todos los tipos de alerta.
- Se ha reestructado algunas tablas en la base de datos, y modelos.
- Se ha agregado la clase Seeder para crear departamentos, y municipios.
- Realizado método api rest para obtener los departamentos.
- Se ha agregado la consulta de deparmantos y municipos en la aplicación web.
- Realizado método api rest para obtener los municipios según departamento.
- Realizado método api rest para obtener los usuarios, con rol usuario.

**10/10/2020**
- Realizado método api rest para consultar usuarios.
- Realizado método api rest para consultar usuarios por nombre.
- Realizado método api rest para registrar mensaje personalizado al usuario.
- Realizado método api rest para cosultar los mensajes personalizados del usuario.
- Realizado método api rest para registrar usuario de confianza.
- Realizado método pai rest para obtener los usuarios de confianza, de un usuario.
- Realizado método pai rest para obtener los usuarios de confianza, de un usuario por nombre y apellido.
- Realizado método api rest para obtener los contactos de emergencia.
- Realizado método api rest para consultar las alertas del usuario.
- Realizado método api rest para obtener los datos de la alerta.
- Realizado método api rest para marcar como visto la notificacion de la alerta (al usuario confianza).
- Realizado método api rest para obtener las alertas no vistas del usuario (considerando visto en notificacion alerta).
- Realizado método api rest para registrar alerta, se considera las sanciones, y usuarios confianza para emitir una notificación.
_NOTA:_ Se envviará notificación, tanto a usuarios que el que emitio alerta agregó a confianza, como también otros usuarios que agregaron a confianza a éste.

## Configuración final
_Ejecutar:_
```
php spark db:seed RolesSeeder
php spark db:seed UsuarioMasterSeeder
php spark db:seed DepartamentoSeeder
php spark db:seed MunicipioSeeder
```
