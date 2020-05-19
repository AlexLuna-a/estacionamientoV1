<?php $__env->startSection('contenido'); ?>
<div class="mostrarEstacionamientos">
    <table class="estacionamientosDisponibles">
        <thead>
            <tr>
                <td>
                    Estacionamiento
                </td>
                <td>
                    Espacios disponibles
                </td>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $estacionamientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $est): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <a href="<?php echo e(action('EstacionamientoController@show',['est'=> $est->id ])); ?>"><?php echo e($est->nombre_est); ?></a>
                </td>
                <td>
                    <?php echo e($est->capacidad_max_est - $est->ocupacion_actual_est); ?>

                </td>
           </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
    </table>
    <?php if(session('nivel') == 10): ?>
<a href="<?php echo e(action('EstacionamientoController@create')); ?>">añadir</a>
<?php endif; ?>




</div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\estacionamientoV1\resources\views/Estacionamiento/index.blade.php ENDPATH**/ ?>