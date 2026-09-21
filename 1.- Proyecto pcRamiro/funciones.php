<?php

function formatearPrecio(int $centimos): string
{
    
    $euros = $centimos / 100;

    return number_format($euros, 2, ",", ".") . "€";

}

function obtenerEstadoStock(int $stock): string 
{

    if ($stock === 0) {
        return "Agotado";
    }

    if ($stock <= 5) {
        return "Ultimas unidades";
    }

    return "Disponible";

}

function obtenerClaseEstado(int $stock): string 
{

    if ($stock === 0) {
        return "agotado";
    }

    if ($stock <= 5) {
        return "aviso";
    }
    
    return "disponible";

}

function escapar(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}
?>