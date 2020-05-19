<?php $__env->startSection('menu'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<table class="mostrarDatos">
    <thead>
    </thead>
    <tbody>
        <tr>
            <td>
                Codigo
            </td>
            <td>
                <?php echo e($usuario->id); ?>

            </td>
        </tr>
        <tr>
            <td>
                Nombre
            </td>
            <td>
                <?php echo e($usuario->apellido_p_user); ?> <?php echo e($usuario->apellido_m_user); ?> <?php echo e($usuario->nombre_user); ?>

            </td>
        </tr>
        <tr>
            <td>
                
            </td>
            <td>
                <?php echo e($usuario->apellido_p_user); ?> <?php echo e($usuario->apellido_m_user); ?> <?php echo e($usuario->nombre_user); ?>

            </td>
        </tr>
</tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\estacionamientoV1\resources\views/pruebas.blade.php ENDPATH**/ ?>