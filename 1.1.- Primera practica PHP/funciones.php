<?php

function formatearPrecio(int $centimos): string {

    $euros = $centimos / 100;

    return number_format($euros, 2, ",", ".") . "€";

}

function obtenerEstado(int $ejemplares): string {
    if ($ejemplares > 5) {
        return "Disponible";
    } elseif ($ejemplares > 0) {
        return "Pocas unidades";
    } else {
        return "agotado";
    }
}

function obtenerClaseEstado(int $ejemplares): string {
    if ($ejemplares > 5) {
        return "disponible";
    } elseif ($ejemplares > 0) {
        return "pocas";
    } else {
        return "agotado";
    }
}

function escapar(string $texto): string {
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

function buscarLibroPorId(array $libros, int $id): ?array {

    foreach ($libros as $libro) {
        if ($libro["id"] === $id) {
            return $libro;
        }
    }
    return null;
}
?>