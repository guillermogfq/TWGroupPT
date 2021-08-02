## Acerca de la Prueba Técnica

La prueba fue desarrollada teniendo como entorno de desarrollo Visual Code Studio. Las versiones utilizadas del framework y otros son las siguientes:

- Laravel *versión* *8.4*
- PHP *versión* *7.4*
- Composer *versión* *2.1.3*

## Desafío 1

Para el desafío uno se solicitó utilizar Eloquent para responder a tres preguntas, las cuales en esencia se deben resolver con funciones de agregación. Se utilizó un Controller para responder a las preguntas y se crean *endpoint* para dar respuesta a cada pregunta. A los endpoint creados **no** se le asoció un ruta en los archivos de configuración (`routes/api.php` o `routes/web.php`);

#### Pregunta 1:
**Pregunta:** *Obtener precio total de la factura.*
**Archivo Solución:** `app/Http/Controllers/ChallengeOneController.php`
**Función Solución:** `challengeOneOne(Invoice $invoice)`
Para esta consulta asumo las cualidades de un endpoint en un controller y asumo que recibo el `Invoice`en la ruta, por lo tanto lo puedo recibir cómo parámetro.

#### Pregunta 2:
**Pregunta:** *Obtener todos id de las facturas que tengan productos con cantidad mayor a 100.*
**Archivo Solución:** `app/Http/Controllers/ChallengeOneController.php`
**Función Solución:** `challengeOneTwo()`

#### Pregunta 3:
**Pregunta:** *Obtener todos los nombres de los productos cuyo valor final sea superior a $1.000.000 CLP.*
**Archivo Solución:** `app/Http/Controllers/ChallengeOneController.php`
**Función Solución:** `challengeOneTreeA()` y `challengeOneTreeB()`

Para este caso, si implementan dos soluciones, debido a que quedo con la duda si se refieren al precio final cómo `quantity * price` o sólo `price`;

## Desafío 2
**Pregunta:** *Indica paso a paso los comandos para una instalación básica de Laravel que me permita ver la página principal (recuerda describir qué hace cada comando).*

- `composer create-project laravel/laravel <name_project>`: Siendo *Composer* uno de los principales gestores de paquetes de **PHP**, se utiliza este comando para crear un proyecto con el nombre que se indique (`<name_project>`) y además descargue todas las dependencias necesarias para desplegar un proyecto básico.
- `cd <name_project>`: para acceder a la carpeta del proyecto.
- `php artisa serve --port 8080`: para servir el proyecto en local, tiene puerto por defecto el 8000, por lo tanto se puede omitir su configuración.
- `http://localhost:8000/`: en un navegador, ingresando a la ruta indicada podrá visualizar la pantalla inicial de su proyecto.

**Opcional:** (*es opcional, si no requiere registrar los datos de BD inicialmente*)
- Con un editor de texto o IDE de uso cotidiano, abrir el archivo `.env`que se encuentra en el directorio raiz del proyecto. En ese archivo podrá configurar la datos necesarios para iniciar la BD de su proyecto.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
