<?php

    const IVA_GENERAL = 0.21; // Siempre nombres en mayus con _ para const
    const UNIDADES_DESCUENTO = 5;
    const DESCUENTO_CANTIDAD = 0.10;

    $productos = [
        ["id" => 1,
        "nombre" => "Teclado",
        "categoria" => "perifericos",
        "precio" => 7990,
        "stock" => 7],

        ["id" => 2,
        "nombre" => "Raton",
        "categoria" => "perifericos",
        "precio" => 3990,
        "stock" => 3],

        ["id" => 3,
        "nombre" => "Monitor 27",
        "categoria" => "perifericos",
        "precio" => 21990,
        "stock" => 0],
        
        ["id" => 4,
        "nombre" => "Auriculares",
        "categoria" => "perifericos",
        "precio" => 4990,
        "stock" => 12]
    ]; // lenguaje no tipado, como JS. Esto es una colección de objetos con clave valor, se llama en este caso arraw asociativo.


?>