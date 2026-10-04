<?php

require_once "datos.php";
require_once "funciones.php";

$idBruto = $_GET["id"] ?? "";

$id = filter_var($idBruto, FILTER_VALIDATE_INT);

$libro = null;
$error = "";

if ($id === false || $id < 1){
    http_response_code(400);
    $error = "El id del producto no es válido";
} else {
    $libro = buscarLibroPorId($libros, $id);
    if ($libro === null) {
        http_response_code(404);
        $error = "El id del producto no es válido";
    }
}

?>