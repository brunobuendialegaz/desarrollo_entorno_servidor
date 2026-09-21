<?php

require_once "funciones.php";
require_once "datos.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DWES Store</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<header class="cabecera">
    <div class="contenedor">
        <h1>DWES Store</h1>
        <p>Versión estática en HTML y CSS</p>

        <nav class="navegacion">
            <a href="index.php">Inicio</a>
            <a href="buscar.php">Buscar</a>
            <a href="compra.php">Comprar</a>
        </nav>
    </div>
</header>

<main class="contenedor">

    <section class="panel">
        <h2>Catálogo</h2>
       
    </section>

    <section class="grid-productos">

        <?php 
            foreach ($productos as $producto){
        ?>
        <article class="producto">
            <h2>
                <?=  $producto["nombre"] ?>
            </h2>
            <p>Categoria: <?=  $producto["categoria"] ?></p>
            
            <p class="precio">
                <?=  formatearPrecio($producto["precio"]) ?>
            </p>
            <p>
                Stock:
                <?= $producto["stock"] ?>
            </p>
            <p class="estado <?=  obtenerClaseEstado($producto["stock"]) ?>">
                estado:
                <?= obtenerEstadoStock($producto["stock"]); ?>
            </p>

        </article>
        <?php } ?>
            
        

    </section>

</main>

<footer class="pie">
    <div class="contenedor">
        Proyecto de Desarrollo Web en Entorno Servidor
    </div>
</footer>

</body>
</html>