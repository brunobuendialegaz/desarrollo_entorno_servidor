<?php 

    require_once "datos.php";
    require_once "funciones.php";

    $errores = [];
    $compraRealizada = false;
    $resultadoComprado = null;
    $productoSeleccionado = null;
    $nombre = "";
    $email = "";
    $unidades = 1;
    $productoId = null;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
 
        $nombre = leerCadena($_POST, "nombre");
        if ($nombre === ""){
            $errores[] = "Debes introducir un nombre";
        }

        $emailBruto = leerCadena($_POST, "email");
        $emailValidado = filter_var($emailBruto, FILTER_VALIDATE_EMAIL);
        if ($emailValidado === false) {
            $errores[] = "Correo electrónico con formato incorrecto";
        } else {
            $email = $emailValidado;
        }

        $productoIdValidado = filter_var($_POST["producto"] ?? "", FILTER_VALIDATE_INT);
        if ($productoIdValidado === false || $productoIdValidado < 1) {
            $errores[] = "Debes seleccionar un producto válido";
        } else {
            $productoId = $productoIdValidado;
            $productoSeleccionado = buscarProductoPorID($productos, $productoId);
            if ($productoSeleccionado === null) {
                $errores[] = "El producto seleccionado no existe";
            }
        }

        $unidadesValidado = filter_var($_POST["unidades"] ?? "", FILTER_VALIDATE_INT);
        if ($unidadesValidado === false || $unidadesValidado < 1) {
            $errores[] = "El numero de unidades debe ser un entero mayor que 1";
        } else {
            $unidades = $unidadesValidado;
        }

        if ($productoSeleccionado !== null && $unidades > $productoSeleccionado["stock"]) {
            $errores[] = "No hay stock suficiente";
        } 

        if ($errores === []) {
            $resultadoComprado = calcularCompra($productoSeleccionado["precio"], $unidades);
            $compraRealizada = true;
        }

    }

    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar - DWES Store</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<header class="cabecera">
    <div class="contenedor">
        <h1>Realizar compra</h1>

        <nav class="navegacion">
            <a href="index.php">Inicio</a>
            <a href="buscar.php">Buscar</a>
        </nav>
    </div>
</header>

<main class="contenedor">

    <form action="compra.php" method="POST" class="formulario">

        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?= escapar($nombre)?>">
        </div>

        <div class="campo">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= escapar($email)?>">
        </div>

        <div class="campo">
            <label for="producto">Producto</label>

            <select name="producto" id="producto">

                <option value="">Selecciona un producto</option>

                <?php foreach ($productos as $producto): ?>

                    <?php $seleccionado = $productoId === $producto["id"]; ?> // para ver que se queda marcado

                    <option value="<?= $producto["id"]?>" 

                    <?= $seleccionado ? "selected" : ""?>>
                        <?= escapar($producto["nombre"])?> - <?= formatearPrecio($producto["precio"]) ?>

                    </option>

                <?php endforeach ?>

            </select>
        </div>

        <div class="campo">
            <label for="unidades">Unidades</label>
            <input type="number" name="unidades" id="unidades" value="<?= escapar($unidades)?>">
        </div>

        <div>
            <button type="submit">Calcular compra</button>
        </div>

    </form>

</main>

</body>
</html>