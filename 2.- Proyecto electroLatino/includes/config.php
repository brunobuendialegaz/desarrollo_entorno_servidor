<?php

declare(strict_types=1);

ini_set('session.use_strict_mode', '1'); // previene ataques de fijación de sesióñ. evita meter en caliente identificadores de sesión diferentes
ini_set('session.use_only_cookies', '1'); // Solo se puede gestionar por cookies el id de sesión

$https = !empty($_SERVER['HTTPS'] && $_SERVER['HTTPS'] === 'on');

session_set_cookie_params([ // parametros de las cookies, solo cambiariamos el lax por Strict, en caso de necesitar MUCHISIMO que las cookies no se compartan con nadie, ni con tus otras aplis. 
    'lifetime' => 0,
    'path' => '/',
    'secure' => $https,
    'httponly' => true,
    'samesite' => 'Lax',
]);

session_start(); // iniciamos o traemos la sesión de cookies

if ( !isset($_SESSION['carrito']) || !is_array($_SESSION['carrito'])) { // inicializamos carrito
    $_SESSION['carrito'] = [];
}

if (empty($_SESSION['csrf_token'])) { // iniciamos el token csrf de sesión (autenticador unico de sesión, para comprobar veracidad de las transacciones)
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require_once __DIR__ . '/funciones.php';
