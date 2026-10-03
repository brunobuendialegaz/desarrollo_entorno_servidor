<?php

require_once "funciones.php";
require_once "datos.php";

$idBruto = $_GET["id"] ?? "";

$id = filter_var($idBruto, FILTER_VALIDATE_INT);

$producto = null;
$error = "";

if (id === false || id < 1) {
    http_response_code(400);
    $error = "El id de producto no es válido";
} else {
    $producto = buscarProductoPorID($productos, $id);
    if ($producto === null) {
        http_response_code(404);
        $error = "El id de producto no es válido";
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

    <article class="producto">

        <h2>Teclado mecánico</h2>

        <p>Categoría: Periféricos</p>

        <p class="precio">79,90 €</p>

        <p>Stock: 7</p>

        <p>
            Estado:
            <span class="estado disponible">Disponible</span>
        </p>

        <div class="acciones">
            <a class="boton" href="compra.php">
                Comprar
            </a>
        </div>

    </article>

</main>

</body>
</html>