<?php $__env->startSection('contenido'); ?>
<div class="mostrarEstacionamientos">
    <table class="estacionamientosDisponibles">
        <thead>
            <tr>
                <td>
                    Usuario
                </td>
                <td>
                    Estacionamiento
                </td>
                <td>
                    Fecha
                </td>
                <td>
                    Accion
                </td>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $mov; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e($m->codigo_user); ?>

                </td>
                <td>
                    <?php $__currentLoopData = $est; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($e->id == $m->codigo_est): ?>
                    <?php echo e($e->nombre_est); ?>

                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td>
                    <?php echo e($m->fecha_mov); ?>

                </td>
                <td>
                    <?php if($m->accion_mov == 'i'): ?>entrada
                    <?php elseif($m->accion_mov == 'o'): ?>Salida
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php if(session('nivel') >= 9): ?>
    <a href="<?php echo e(action('estacionamientoController@create')); ?>">añadir</a>
    <?php endif; ?>




</div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\estacionamientoV1\resources\views/Movimientos/index.blade.php ENDPATH**/ ?>