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

        <?php foreach ($libros as $libro) { ?> 

            <article class="libro">
                <h3><?= $libro["titulo"] ?></h3>
                <p><?= $libro["autor"] ?></p>
                <p class="precio"><?= formatearPrecio($libro["precio_centimos"]) ?></p>
                <p>Ejemplares: <?= $libro["ejemplares"] ?></p>
                <p>
                    Estado:
                    <span class="estado <?= obtenerClaseEstado($libro["ejemplares"]) ?>">
                        <?= obtenerEstado($libro["ejemplares"]) ?>
                    </span>
                </p>
            </article>   

        <?php } ?>

    </section>

</main>


<footer>
    <div class="contenedor">
        Desarrollo Web en Entorno Servidor
    </div>
</footer>

</body>

</html>