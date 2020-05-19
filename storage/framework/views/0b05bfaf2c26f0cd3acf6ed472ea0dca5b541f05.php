<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>QCI's Parking</title>
        <meta lang="es"/>
        <link rel="stylesheet" type="text/css" href="/css/estilos.css"/>
    </head>
    <body>
        <!--CABECERA -->
        <div class="Cabecera">
            <!--LOGO -->
            <div class="Logo">
                <div id="imagen">
                    <a href="<?php echo e(action('UsuarioController@index')); ?>"><image src="/css/Logo/Logo_qci.jpg"/></a>
                </div>    
            </div>
            <!--TITULO -->
            <div id="titulo">
                <a href="<?php echo e(action('UsuarioController@index')); ?>">Estacionate CUCEI</a>
            </div>
            <?php if(session('usuario') ): ?>
            <!-- MENU -->
            <nav class="menu">
                <ul>
                    <li>
                        <a href="<?php echo e(action('UsuarioController@index')); ?>">inicio</a>
                </li>
                <li>
                    <a href="<?php echo e(action('estacionamientoController@index')); ?>">Estacionamientos</a>
                </li>
                <li>
                    <a href="<?php echo e(action('movimientoController@index')); ?>">Movimientos</a>
                </li>
                <li>
                    <a href="<?php echo e(action('vehiculoController@index')); ?>">Vehiculos</a>
                </li>
                <?php if(session()->exists('nivel')): ?>
                <?php if(session('nivel')>=9): ?>
                <li>
                    <a href="">Control acceso</a>
                </li>
                <?php endif; ?>
                <?php if(session('nivel')==10): ?>
                <li>
                    <a href="">Administrar</a>
                </li>
                <?php endif; ?>

                <?php endif; ?>
                
                <?php echo $__env->yieldContent('menu'); ?>
            </ul>
        </nav>

        <div class="boton_log">
            <div class="dropdown">
                <button class="dropbtn"><?php echo e(session('usuario')->nombre_user); ?></button>
                <div class="dropdown-content">
                    <a href="<?php echo e(action('UsuarioController@edit', ['us'=> session('usuario')->id ])); ?>">Administrar cuenta</a>
                    <a href="<?php echo e(action('UsuarioController@loggout')); ?>">Cerrar sesion</a>
                </div>
            </div>
        </div>

        <?php endif; ?>
    </div>

    <div class="contenedor">
        <?php echo $__env->yieldContent('contenido'); ?>
    </div>
    <div class="pie">

    </div>
</body>
</html>



<?php /**PATH D:\wamp64\www\estacionamientoV1\resources\views/layout/master.blade.php ENDPATH**/ ?>