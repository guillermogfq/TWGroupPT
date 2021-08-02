## Acerca de la Prueba Técnica

La prueba fue desarrollada teniendo como entorno de desarrollo Visual Code Studio. Las versiones utilizadas del framework y otros son las siguientes:

- Laravel *versión* *8.4*
- PHP *versión* *7.4*
- Composer *versión* *2.1.3*

## Desafío 1

Para el desafío uno se solicitó utilizar Eloquent para responder a tres preguntas, las cuales en esencia se deben resolver con funciones de agregación. Se utilizó un Controller para responder a las preguntas y se crean *endpoint* para dar respuesta a cada pregunta.
Cada campo de los Modelos/Entidades `Invoice` y `Product`, se les creo un archivo de migración, en donde se especifican su etiqueta y el tipo de dato.

**Observación:** Si se quieren probar los servicios que dan respuesta a cada pregunta, se solicita configurar una base de datos en el proyecto y ejecutar la siguiente instrucción:

- `php artisan migrate:fresh --seed`

#### Pregunta 1:
**Pregunta:** *Obtener precio total de la factura.*

**Archivo Solución:** `app/Http/Controllers/ChallengeOneController.php`

**Función Solución:** `challengeOneOne(Invoice $invoice)`

**Endpoint:** *GET* [http://localhost:8000/api/challenge/one/one/1](http://localhost:8000/api/challenge/one/one/1)
Para esta consulta asumo las cualidades de un endpoint en un controller y asumo que recibo el `Invoice`en la ruta, por lo tanto lo puedo recibir cómo parámetro.

#### Pregunta 2:
**Pregunta:** *Obtener todos id de las facturas que tengan productos con cantidad mayor a 100.*

**Archivo Solución:** `app/Http/Controllers/ChallengeOneController.php`

**Función Solución:** `challengeOneTwo()`

**Endpoint:** *GET* [http://localhost:8000/api/challenge/one/two](http://localhost:8000/api/challenge/one/two)
#### Pregunta 3:
**Pregunta:** *Obtener todos los nombres de los productos cuyo valor final sea superior a $1.000.000 CLP.*

**Archivo Solución:** `app/Http/Controllers/ChallengeOneController.php`

**Función Solución:** `challengeOneTreeA()` y `challengeOneTreeB()`

**Endpoint A:** *GET* [http://localhost:8000/api/challenge/one/tree/a](http://localhost:8000/api/challenge/one/tree/a)
**Endpoint B:** *GET* [http://localhost:8000/api/challenge/one/tree/](http://localhost:8000/api/challenge/one/tree/b)

Para este caso, si implementan dos soluciones, debido a que quedo con la duda si se refieren al precio final cómo `quantity * price` o sólo `price`;

## Desafío 2
**Pregunta:** *Indica paso a paso los comandos para una instalación básica de Laravel que me permita ver la página principal (recuerda describir qué hace cada comando).*

- `composer create-project laravel/laravel <name_project>`: Siendo *Composer* uno de los principales gestores de paquetes de **PHP**, se utiliza este comando para crear un proyecto con el nombre que se indique (`<name_project>`) y además descargue todas las dependencias necesarias para desplegar un proyecto básico.
- `cd <name_project>`: para acceder a la carpeta del proyecto.
- `php artisa serve --port 8080`: para servir el proyecto en local, tiene puerto por defecto el 8000, por lo tanto se puede omitir su configuración.
- `http://localhost:8000/`: en un navegador, ingresando a la ruta indicada podrá visualizar la pantalla inicial de su proyecto.

**Opcional:** (*es opcional, si no requiere registrar los datos de BD inicialmente*)
- Con un editor de texto o IDE de uso cotidiano, abrir el archivo `.env`que se encuentra en el directorio raiz del proyecto. En ese archivo podrá configurar la datos necesarios para iniciar la BD de su proyecto.


## Desafío 3
**Pregunta:** *Respecto a la estructura de datos del desafío 1, agrega a "Invoice" un campo "total" y escribe un Observador (Observer) en el que cada vez que se inserter un registro en la tabla "Product", aumente el valor de "total" de la tabla "Invoice".*

**Solución:** `app/Observers/ProductObserver.php`

**Observación:** similar al situación con el ejecicio 3 del Desafío 1, no me ha quedado claro si en total se requiere acumular `quantity * price` o sólo `price`, por lo tanto la segunda opción a quedado comentada en el código de la solución.

## Desafío 4
**Pregunta:** *Explícanos ¿qué es "Laravel Jetstream"? y ¿qué permite "Livewire" a los programadores?*

**Respuesta:** Laravel Jetstream nos provee un kit de inicio para implementar en nuestros proyectos, simplicando tareas que pueden tomar mucho tiempo. Nos provee todo lo necesario para implemetar: *inicio de sesión, registro de usuario, verificación de correo electrónico, verificación en dos pasos, gestión de sesiones, autenticación para APIs*. Además, podemos utilizar Livewire con Laravel Jetstream, el cual es un framework que trabaja junto a Blade para ayudar en la creación de interfaces dinámicas, con ello modularizar y componentizar sección de nuestras interfaces.


## Desafío 5
**Pregunta:** 
Manos al código! basado en las siguientes tablas, construye un pequeño software:

Tablas de la Base de Datos:
- users
- tasks
- logs

Los requerimientos para el software son:
Construir un CRUD, utilizar Bootstrap para el front y en las vistas el uso de Layouts en Blade.

Las funciones a desarrollar son las siguientes:
El sistema debe permitir que los usuarios se registren y puedan iniciar sesión, el software no debe permitir que el correo email@hack.net se pueda registrar.
Sólo los usuarios con sesión iniciada deberían poder ver el listado de tareas (tasks)  de la plataforma en la primera pantalla luego de iniciar sesión.
El sistema debería permitir que cualquier usuario cree una nueva tarea (tasks), esta debe contener como mínimo la descripción de la tarea, el usuario asignado, la fecha máxima de ejecución.
Cuando un usuario logueado entre a una tarea asignada a él, el sistema debe permitir que este agregue registros (logs) asociados a la tarea, los registros contienen como mínimo el comentario y la fecha de este. Los usuarios no asignados a la tarea, no pueden acceder a ella, solo verla en el listado.
Al momento de que se genere un nuevo registro (logs), es necesario que se envíe un correo electrónico al autor de la tarea (Puedes utilizar Mailtrap para Testing, aunque lo importante no es la evidencia del envío, sino el código).
En el listado de tareas, el sistema debería mostrar en rojo las tareas cuya "fecha máxima de ejecución" haya expirado respecto a hoy. 
Recuerda usar bootstrap en el diseño, y que puedes ingresar todas las tareas que quieras, insertando campos en la tabla tasks.

**Solución:** 
Se ha dispuesto de una solución y para poder visualizarla, se recomienda hacer los siguientes pasos:

- `git clone https://github.com/guillermogfq/TWGroupPT.git` Para clonar el proyecto en local.
- `cd TWGroupPT`Para acceder a la carpeta del proyecto.
- `composer install` Debido a que se ignora muy frecuentemente el hacer control de versiones de la carpeta vendor, se necesita descargar las dependecias.
- `cp .env.example .env` **Opcional** en el caso de de que no se haya generado el .env.
- Configurar la BD en `.env``
- `php artisan migrate:fresh --seed` para crear la BD y realizar algunas inserciones.
- Ingresar a `http://localhost:8000/login`
- Credenciales de Prueba: `email: guillermofuentesquijada@gmail.com` y `contraseña: password`
- Para la tabla `Task`no crearon inseciones.
- Para configurar el mailtrap y no se presenten errores al crear registros, se detalla la configuración del `.env`:

  - `MAIL_MAILER=smtp`
  - `MAIL_HOST=smtp.mailtrap.io`
  - `MAIL_PORT=2525`
  - `MAIL_USERNAME=2d349bcb210239`
  - `MAIL_PASSWORD=9f0c49b0660566`
  - `MAIL_ENCRYPTION=tls`


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
