<?php $__env->startSection('menu'); ?>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('contenido'); ?>
<h2>Entraste</h2>
<?php
echo 'Vista Index';
var_dump(session('nivel'));


?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Usuario.masterUsuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\estacionamientoV1\resources\views/Usuario/index.blade.php ENDPATH**/ ?>