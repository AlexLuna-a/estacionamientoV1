

<?php $__env->startSection('menu'); ?>

<?php for($i=1; $i<=5; $i++): ?>
<li>
    <a href="" >Opcion <?php echo e($i); ?></a>
</li>
<?php endfor; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Como vergas no</h1>

<?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($tipo->nombre_tipo); ?><br/>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\estacionamientoV1\resources\views/pruebas.blade.php ENDPATH**/ ?>