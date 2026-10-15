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

    

    

    <?php if ($compraRealizada === true): ?>
        <section class="panel">

            <h2>Compra realizada con éxito</h2>

            <table class="resumen">

                <tr>
                    <th>Nombre</th>
                    <td><?= escapar($nombre) ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= escapar($email) ?></td>
                </tr>
                <tr>
                    <th>Producto</th>
                    <td><?= escapar($productoSeleccionado["nombre"]) ?></td>
                </tr>
                <tr>
                    <th>Precio unitario</th>
                    <td><?= formatearPrecio($productoSeleccionado["precio"]) ?></td>
                </tr>
                <tr>
                    <th>Unidades</th>
                    <td><?= $unidades ?></td>
                </tr>
                <tr>
                    <th>Subtotal</th>
                    <td><?= formatearPrecio($resultadoComprado["subtotal"]) ?></td>
                </tr>
                <?php if ($resultadoComprado["descuento"] > 0): ?>
                    <tr>
                        <th>Descuento</th>
                        <td><?= formatearPrecio($resultadoComprado["descuento"]) ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <th>Base</th>
                    <td><?= formatearPrecio($resultadoComprado["base"]) ?></td>
                </tr>
                <tr>
                    <th>IVA</th>
                    <td><?= formatearPrecio($resultadoComprado["iva"]) ?></td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td><?= formatearPrecio($resultadoComprado["total"]) ?></td>
                </tr>


            </table>
            <br>
            <a href="compra.php" class="boton">Realizar otra compra</a>

        </section>
    <?php else: ?>

        <?php if ($errores !== []): ?>
            <section class="errores">

                <h2>Revisa los siguientes errores</h2>

                <ul>
                    <?php foreach ($errores as $error): ?>
                        <li><?= escapar($error) ?></li>
                    <?php endforeach; ?>
                </ul>

            </section>
        <?php endif; ?>
        <section class="panel">
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

        <p>A partir de <strong> <?= UNIDADES_DESCUENTO ?> </strong> unidades se aplica  <strong> <?= DESCUENTO_CANTIDAD * 100 ?>% </strong> de descuento</p>

        <div>
            <button type="submit">Calcular compra</button>
        </div>

    </form>
    </section>
    <?php endif; ?> 

</main>

</body>
</html>