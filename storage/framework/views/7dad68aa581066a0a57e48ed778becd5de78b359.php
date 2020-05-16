
<?php $__env->startSection('menu'); ?>
<li>
    <a href="<?php echo e(action('usuarioController@index')); ?>" >Inicio</a>
</li>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\estacionamientoV1\resources\views/Usuario/masterUsuario.blade.php ENDPATH**/ ?>