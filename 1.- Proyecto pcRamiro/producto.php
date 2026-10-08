<?php

require_once "funciones.php";
require_once "datos.php";

$idBruto = $_GET["id"] ?? "";

$id = filter_var($idBruto, FILTER_VALIDATE_INT);

$producto = null;
$error = "";

if ($id === false || $id < 1) {
    http_response_code(400);
    $error = "El id de producto no es válido";
} else {
    $producto = buscarProductoPorID($productos, $id);
    if ($producto === null) {
        http_response_code(404);
        $error = "El producto solicitado no existe";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto - DWES Store</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<header class="cabecera">
    <div class="contenedor">
        <h1>DWES Store</h1>

        <nav class="navegacion">
            <a href="index.php">Inicio</a>
            <a href="buscar.php">Buscar</a>
            <a href="compra.php">Comprar</a>
        </nav>
    </div>
</header>

<main class="contenedor">
    <?php if ($error !== ""): ?>

        <section class="panel">
            <h2>Error</h2>
            <p><?= escapar($error) ?></p>
            <a class="boton" href="index.php">Inicio</a>
        </section>

    <?php else: ?>

    <article class="producto">
        <h2><?= escapar($producto["nombre"])?></h2>
        <p>Categoria: <?= escapar($producto["categoria"])?></p>
        <p class="precio"><?=formatearPrecio($producto["precio"])?></p>
        <p>Stock: <?=$producto["stock"]?></p>
        <p class="estado <?=  obtenerClaseEstado($producto["stock"]) ?>">
                Estado: <?= obtenerEstadoStock($producto["stock"]); ?>
        </p>
    </article>

    <?php endif ?>
</main>

</body>
</html>