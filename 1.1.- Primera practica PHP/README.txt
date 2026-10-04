===============================================================================
                    PRÁCTICA PHP - MINI BIBLIOTECA
===============================================================================

Módulo: Desarrollo Web en Entorno Servidor


===============================================================================
1. DESCRIPCIÓN DE LA PRÁCTICA
===============================================================================

En esta práctica vas a desarrollar una pequeña aplicación web denominada
"Mini Biblioteca".

Se proporciona una interfaz inicial ya diseñada. Tu objetivo será transformar
progresivamente esta página estática en una aplicación dinámica desarrollada
con PHP.

La aplicación deberá:

  - Almacenar la información de los libros en un array.
  - Recorrer el array para generar dinámicamente el catálogo.
  - Utilizar funciones reutilizables.
  - Formatear correctamente los precios.
  - Mostrar el estado de disponibilidad de cada libro.
  - Generar clases CSS dinámicamente.
  - Permitir consultar un libro concreto mediante su identificador.
  - Validar los datos recibidos mediante GET.


Contenidos que se trabajarán:

  - Variables y arrays en PHP.
  - Arrays asociativos.
  - require_once.
  - Funciones.
  - Parámetros y tipos.
  - return.
  - Condicionales if.
  - Bucles foreach.
  - Generación dinámica de HTML.
  - Formateo de datos.
  - Clases CSS dinámicas.
  - Escape de contenido HTML.
  - Parámetros GET.
  - Uso de $_GET.
  - Validación de datos.
  - Búsqueda dentro de arrays.
  - Uso de null.
  - Separación del código en diferentes archivos.


===============================================================================
2. ESTRUCTURA DEL PROYECTO
===============================================================================

El proyecto deberá terminar teniendo la siguiente estructura:

    mini-biblioteca/
    |
    |-- index.php
    |-- libro.php
    |-- datos.php
    |-- funciones.php
    |-- estilos.css
    |-- README.txt


Responsabilidad de cada archivo:

    datos.php
        Contendrá los datos de los libros.

    funciones.php
        Contendrá las funciones reutilizables de la aplicación.

    index.php
        Será la página principal.
        Mostrará el catálogo completo de libros.

    libro.php
        Mostrará la información de un libro concreto.

    estilos.css
        Contiene los estilos visuales de la aplicación.


===============================================================================
3. CREAR LOS DATOS DE LOS LIBROS
===============================================================================

Crea el archivo:

    datos.php


Dentro de este archivo deberás crear una variable llamada:

    $libros


$libros será un array que contendrá todos los libros de la biblioteca.

Cada libro deberá ser un ARRAY ASOCIATIVO con las siguientes claves:

    id
    titulo
    autor
    precio_centimos
    ejemplares


Debes introducir como mínimo los siguientes libros:


    ID:                 1
    Título:             El camino
    Autor:              Miguel Delibes
    Precio:             1290 céntimos
    Ejemplares:         4


    ID:                 2
    Título:             Don Quijote de la Mancha
    Autor:              Miguel de Cervantes
    Precio:             1850 céntimos
    Ejemplares:         10


    ID:                 3
    Título:             La Celestina
    Autor:              Fernando de Rojas
    Precio:             1095 céntimos
    Ejemplares:         0


IMPORTANTE:

Los precios deberán almacenarse como números enteros expresados en céntimos.

Por ejemplo:

    12,90 €  -->  1290

    18,50 €  -->  1850

    10,95 €  -->  1095


NO debes almacenar directamente:

    "12,90 €"

dentro del array.


===============================================================================
4. CREAR EL ARCHIVO DE FUNCIONES
===============================================================================

Crea el archivo:

    funciones.php


Este archivo contendrá las funciones reutilizables de la aplicación.


-------------------------------------------------------------------------------
4.1. FUNCIÓN formatearPrecio()
-------------------------------------------------------------------------------

Implementa una función con la siguiente declaración:

    function formatearPrecio(int $centimos): string


La función recibirá un precio expresado en céntimos y deberá devolver una
cadena con el precio expresado correctamente en euros.


Ejemplos:

    formatearPrecio(1290)   -->   "12,90 €"

    formatearPrecio(1850)   -->   "18,50 €"

    formatearPrecio(1095)   -->   "10,95 €"


Puedes utilizar la función number_format() de PHP para realizar el formateo.


===============================================================================
5. CARGAR LOS ARCHIVOS NECESARIOS
===============================================================================

Modifica index.php para cargar al comienzo de la página los archivos:

    datos.php
    funciones.php


Debes utilizar:

    require_once


A partir de ese momento, index.php deberá poder utilizar:

    - La variable $libros.
    - Las funciones definidas en funciones.php.


===============================================================================
6. GENERAR EL CATÁLOGO CON foreach
===============================================================================

Actualmente los libros aparecen escritos directamente en el HTML.

Debes eliminar esa repetición y generar las tarjetas de los libros
dinámicamente utilizando PHP.


Utiliza:

    foreach


para recorrer el array:

    $libros


En cada iteración deberás generar un elemento:

    <article class="libro">


Cada tarjeta deberá mostrar dinámicamente:

    - Título.
    - Autor.
    - Precio.
    - Número de ejemplares.


IMPORTANTE:

Para mostrar el precio NO debes realizar directamente la conversión
en index.php.

Debes utilizar la función:

    formatearPrecio()


El resultado visual deberá mantenerse similar al de la versión inicial.


===============================================================================
7. CALCULAR EL ESTADO DE DISPONIBILIDAD
===============================================================================

Queremos informar al usuario de la disponibilidad de cada libro dependiendo
del número de ejemplares existentes.


Implementa en funciones.php:

    function obtenerEstado(int $ejemplares): string


La función deberá cumplir las siguientes reglas:


    +----------------------+--------------------+
    | EJEMPLARES           | RESULTADO          |
    +----------------------+--------------------+
    | 0                    | No disponible      |
    | Entre 1 y 5          | Pocas unidades     |
    | Más de 5             | Disponible         |
    +----------------------+--------------------+


Ejemplos:

    obtenerEstado(0)       -->   "No disponible"

    obtenerEstado(3)       -->   "Pocas unidades"

    obtenerEstado(5)       -->   "Pocas unidades"

    obtenerEstado(10)      -->   "Disponible"


Utiliza estructuras:

    if

y:

    return


para implementar esta lógica.


Después modifica index.php para utilizar esta función al mostrar cada libro.


===============================================================================
8. GENERAR LA CLASE CSS SEGÚN LA DISPONIBILIDAD
===============================================================================

Además del texto anterior, queremos que el estado tenga un aspecto diferente
dependiendo del número de ejemplares.


En estilos.css ya existen las clases:

    .disponible

    .pocas

    .agotado


Implementa en funciones.php:

    function obtenerClaseEstado(int $ejemplares): string


La función deberá devolver:


    +----------------------+--------------------+
    | EJEMPLARES           | CLASE CSS          |
    +----------------------+--------------------+
    | 0                    | agotado            |
    | Entre 1 y 5          | pocas              |
    | Más de 5             | disponible         |
    +----------------------+--------------------+


Utiliza esta función para construir dinámicamente el atributo class
del elemento <span>.


PHP deberá ser capaz de generar, dependiendo del caso:


    <span class="estado disponible">
        Disponible
    </span>


o:


    <span class="estado pocas">
        Pocas unidades
    </span>


o:


    <span class="estado agotado">
        No disponible
    </span>


IMPORTANTE:

No debes escribir una condición diferente para cada libro.

La decisión deberá realizarse utilizando las funciones creadas.


===============================================================================
9. ESCAPAR EL CONTENIDO HTML
===============================================================================

Implementa en funciones.php:

    function escapar(string $texto): string


La función deberá utilizar:

    htmlspecialchars()


con las opciones trabajadas en clase:

    ENT_QUOTES
    ENT_SUBSTITUTE
    UTF-8


Utiliza posteriormente escapar() cuando muestres:

    - El título del libro.
    - El autor del libro.


El objetivo es evitar que determinados caracteres almacenados en los datos
sean interpretados por el navegador como código HTML.


Recuerda la regla trabajada en clase:

    +---------------------------------------------------------+
    |   VALIDAR AL ENTRAR  /  ESCAPAR AL SALIR               |
    +---------------------------------------------------------+


===============================================================================
10. AÑADIR UN ENLACE A CADA LIBRO
===============================================================================

Cada tarjeta del catálogo deberá tener un enlace con el texto:

    Ver libro


El enlace deberá dirigir a:

    libro.php


y deberá enviar mediante GET el identificador del libro.


Ejemplo para el libro con ID 1:

    <a href="libro.php?id=1">
        Ver libro
    </a>


Ejemplo para el libro con ID 2:

    <a href="libro.php?id=2">
        Ver libro
    </a>


IMPORTANTE:

No debes escribir los identificadores manualmente.

El identificador deberá obtenerse del libro que se está procesando
en ese momento dentro del foreach.


===============================================================================
11. BUSCAR UN LIBRO POR SU IDENTIFICADOR
===============================================================================

Antes de desarrollar libro.php, implementa en funciones.php:

    function buscarLibroPorId(array $libros, int $id): ?array


La función recibirá:

    1. El array completo de libros.

    2. El identificador del libro que queremos localizar.


La función deberá recorrer $libros utilizando:

    foreach


Si encuentra un libro cuyo "id" coincida con el identificador recibido,
deberá devolver el array correspondiente a ese libro.


Ejemplo:

    buscarLibroPorId($libros, 2)

                |
                v

         encuentra ID 2

                |
                v

         devuelve el libro


Si termina de recorrer todos los libros sin encontrarlo, deberá devolver:

    null


Ejemplo:

    buscarLibroPorId($libros, 999)

                |
                v

       no encuentra el libro

                |
                v

              null


===============================================================================
12. CREAR LA PÁGINA libro.php
===============================================================================

Crea el archivo:

    libro.php


Esta página deberá cargar:

    datos.php
    funciones.php


utilizando:

    require_once


La página recibirá mediante GET un parámetro denominado:

    id


Por ejemplo:

    libro.php?id=2


Deberás recuperar este dato utilizando:

    $_GET


IMPORTANTE:

El valor recibido NO deberá utilizarse directamente.

Primero tendrás que comprobar que representa un número entero válido utilizando
los mecanismos de validación trabajados en clase.


Una vez obtenido un identificador válido, utiliza:

    buscarLibroPorId()


para localizar el libro correspondiente.


===============================================================================
13. COMPORTAMIENTO DE libro.php
===============================================================================

La página deberá contemplar TRES situaciones diferentes.


-------------------------------------------------------------------------------
CASO 1 - EL LIBRO EXISTE
-------------------------------------------------------------------------------

Por ejemplo:

    libro.php?id=2


La página deberá mostrar como mínimo:

    Don Quijote de la Mancha

    Autor: Miguel de Cervantes

    Precio: 18,50 €

    Ejemplares: 10

    Estado: Disponible


Para construir esta información deberás reutilizar las funciones creadas
anteriormente.

NO debes volver a programar en libro.php la lógica correspondiente al precio,
disponibilidad o escape.


-------------------------------------------------------------------------------
CASO 2 - EL IDENTIFICADOR NO ES VÁLIDO
-------------------------------------------------------------------------------

Por ejemplo:

    libro.php?id=hola


La página deberá mostrar un mensaje indicando que el identificador recibido
no es válido.


-------------------------------------------------------------------------------
CASO 3 - EL LIBRO NO EXISTE
-------------------------------------------------------------------------------

Por ejemplo:

    libro.php?id=999


El identificador 999 es un número entero válido, pero no corresponde a ninguno
de los libros existentes.

La página deberá mostrar un mensaje indicando que el libro solicitado
no existe.


===============================================================================
14. REUTILIZACIÓN DE FUNCIONES
===============================================================================

Uno de los objetivos principales de la práctica es EVITAR DUPLICAR CÓDIGO.


Por ejemplo:

    index.php

y:

    libro.php


necesitan mostrar precios.


NO debes repetir en ambos archivos la lógica necesaria para convertir
los céntimos a euros.

Esa responsabilidad corresponde a:

    formatearPrecio()


Lo mismo ocurre con:

    obtenerEstado()

    obtenerClaseEstado()

    escapar()

    buscarLibroPorId()


Cada operación deberá programarse UNA SOLA VEZ en funciones.php y reutilizarse
desde los archivos que la necesiten.


===============================================================================
15. AMPLIACIÓN - ORDENAR EL CATÁLOGO MEDIANTE GET
===============================================================================

Una vez completados correctamente todos los apartados anteriores, añade al
catálogo la posibilidad de ordenar los libros.


En index.php deberán aparecer tres opciones:

    Ordenar por: ID | Título | Precio


Cada opción enviará un parámetro GET denominado:

    orden


Ejemplos:

    index.php?orden=id

    index.php?orden=titulo

    index.php?orden=precio


Recupera el criterio seleccionado y almacénalo en una variable:

    $orden


Si NO se recibe ningún criterio de ordenación, deberá utilizarse por defecto:

    id


Antes de realizar la ordenación, crea una COPIA del array de libros para evitar
modificar directamente el array original.


La aplicación deberá conseguir que:

    orden=id
        Ordene los libros por identificador.

    orden=titulo
        Ordene los libros alfabéticamente por título.

    orden=precio
        Ordene los libros de menor a mayor precio.


Finalmente, el foreach encargado de generar el catálogo deberá recorrer
el array ya ordenado.


===============================================================================
16. REQUISITOS OBLIGATORIOS
===============================================================================

Antes de entregar, comprueba que tu aplicación cumple TODOS estos requisitos:


    [ ] Los libros están almacenados en datos.php.

    [ ] Los libros están representados mediante arrays asociativos.

    [ ] Los precios están almacenados como enteros expresados en céntimos.

    [ ] El catálogo no contiene una tarjeta escrita manualmente
        para cada libro.

    [ ] Las tarjetas se generan utilizando foreach.

    [ ] Se utiliza require_once.

    [ ] Las funciones reutilizables están en funciones.php.

    [ ] Las funciones utilizan tipos en sus parámetros y valores de retorno.

    [ ] Los precios se muestran utilizando formatearPrecio().

    [ ] El estado se calcula mediante obtenerEstado().

    [ ] La clase CSS se calcula mediante obtenerClaseEstado().

    [ ] Los títulos y autores se escapan antes de mostrarlos en HTML.

    [ ] Cada libro tiene un enlace dinámico hacia libro.php.

    [ ] libro.php recibe el identificador mediante GET.

    [ ] El identificador recibido se valida antes de utilizarlo.

    [ ] La búsqueda del libro se realiza mediante buscarLibroPorId().

    [ ] La aplicación controla el caso de un libro inexistente.

    [ ] Se evita duplicar innecesariamente código.


===============================================================================
17. FUNCIONES MÍNIMAS DEL PROYECTO
===============================================================================

Al finalizar la práctica, funciones.php deberá contener como mínimo:


    function formatearPrecio(int $centimos): string


    function obtenerEstado(int $ejemplares): string


    function obtenerClaseEstado(int $ejemplares): string


    function escapar(string $texto): string


    function buscarLibroPorId(array $libros, int $id): ?array


IMPORTANTE:

En este enunciado se indica QUÉ debe hacer cada función.

La implementación de cada función forma parte del ejercicio.


===============================================================================
18. PRUEBAS MÍNIMAS
===============================================================================

Antes de entregar deberás comprobar, como mínimo, los siguientes casos:


    ----------------------------------------------------------------------
    PRUEBA                              RESULTADO ESPERADO
    ----------------------------------------------------------------------

    Libro con 0 ejemplares             No disponible / agotado

    Libro con 4 ejemplares             Pocas unidades / pocas

    Libro con 10 ejemplares            Disponible / disponible

    Precio 1290                        12,90 €

    libro.php?id=1                     Muestra el libro con ID 1

    libro.php?id=3                     Muestra el libro con ID 3

    libro.php?id=999                   El libro no existe

    libro.php?id=hola                  Identificador no válido

    ----------------------------------------------------------------------


No compruebes únicamente que la página "se ve bien".

Debes comprobar también que:

    - Las funciones devuelven los resultados correctos.
    - Los datos recibidos son validados.
    - Se controlan las situaciones incorrectas.
    - No aparecen errores o advertencias de PHP.


===============================================================================
19. ENTREGA
===============================================================================

Deberás entregar la carpeta completa del proyecto:


    mini-biblioteca/
    |
    |-- index.php
    |-- libro.php
    |-- datos.php
    |-- funciones.php
    |-- estilos.css
    |-- README.txt


El proyecto deberá ejecutarse correctamente en el entorno PHP utilizado
en clase.


Se valorará especialmente:

    - Correcta indentación del código.
    - Nombres de variables descriptivos.
    - Nombres de funciones descriptivos.
    - Separación de responsabilidades entre archivos.
    - Reutilización de funciones.
    - Ausencia de código duplicado innecesariamente.
    - Correcta validación de los datos recibidos.
    - Escape de los textos mostrados en HTML.


===============================================================================
20. OBJETIVO FINAL
===============================================================================

Al terminar la práctica deberás ser capaz de explicar con tus propias palabras
el recorrido de la información dentro de la aplicación:


        datos.php
            |
            v
         $libros
            |
            v
        index.php
            |
            v
         foreach
            |
            +----------------------> funciones.php
            |
            v
      HTML generado
            |
            v
       "Ver libro"
            |
            v
     libro.php?id=...
            |
            v
          $_GET
            |
            v
     Validación del ID
            |
            v
   buscarLibroPorId()
            |
            v
     Mostrar el libro


===============================================================================
                              IMPORTANTE
===============================================================================

El objetivo de la práctica NO es únicamente conseguir que la aplicación
funcione.

Debes comprender cómo PHP utiliza:

    DATOS
      |
      v
    ARRAYS
      |
      v
    FUNCIONES
      |
      v
    CONDICIONALES Y BUCLES
      |
      v
    GENERACIÓN DE HTML
      |
      v
    NAVEGADOR




