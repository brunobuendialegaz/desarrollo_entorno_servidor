<?php
    require_once "datos.php";
    require_once "funciones.php"
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mini Biblioteca</title>

    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<header>
    <div class="contenedor">

        <h1>Mini Biblioteca</h1>

        <nav>
            <a href="index.php">Libros</a>
        </nav>

    </div>
</header>


<main class="contenedor">

    <h2>Catálogo de libros</h2>

    <section class="libros">


        <article class="libro">

            <h3>El camino</h3>

            <p>
                Autor: Miguel Delibes
            </p>

            <p class="precio">
                12,90 €
            </p>

            <p>
                Ejemplares: 4
            </p>

            <p>
                Estado:
                <span class="estado pocas">
                    Pocas unidades
                </span>
            </p>

        </article>


        <article class="libro">

            <h3>Don Quijote de la Mancha</h3>

            <p>
                Autor: Miguel de Cervantes
            </p>

            <p class="precio">
                18,50 €
            </p>

            <p>
                Ejemplares: 10
            </p>

            <p>
                Estado:
                <span class="estado disponible">
                    Disponible
                </span>
            </p>

        </article>


        <article class="libro">

            <h3>La Celestina</h3>

            <p>
                Autor: Fernando de Rojas
            </p>

            <p class="precio">
                10,95 €
            </p>

            <p>
                Ejemplares: 0
            </p>

            <p>
                Estado:
                <span class="estado agotado">
                    No disponible
                </span>
            </p>

        </article>


    </section>

</main>


<footer>
    <div class="contenedor">
        Desarrollo Web en Entorno Servidor
    </div>
</footer>

</body>

</html>