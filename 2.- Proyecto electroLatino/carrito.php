<?php
/** CARRITO: estructura HTML preparada para completar en clase. */
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/productos.php';
cabecera('Tu carrito');
?>
<section class="intro">
    <p class="etiqueta">ESTADO DEL CARRITO</p>
    <h1>Tu carrito</h1>
    <p>Inicialmente no recordamos productos. Lo solucionaremos con sesiones PHP.</p>
</section>

    <?php if (empty($_SESSION['carrito'])):  ?>
        <div class="panel">
            <p>Tu carrito está vacío</p>
        </div>    

        <a href="index.php" class="boton">Ir al Catálogo</a>
    <?php else: ?>

    <?php endif; ?>
    
</div>
<?php pie(); ?>
