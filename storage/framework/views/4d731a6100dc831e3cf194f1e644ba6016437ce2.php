<?php $__env->startSection('contenido'); ?>
<table class="tablaDetalle">
    <thead>
        <tr>
            <td colspan="2"><h1><?php echo e($est->nombre_est); ?></h1></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                Ubicacion: 
            </td>
            <td>
                <?php echo e($est->ubicacion_est); ?>

            </td>
        </tr>
        <tr>
            <td>
                Capacidad: 
            </td>
            <td>
                <?php echo e($est->capacidad_max_est); ?>

            </td>
        </tr>
        <tr>
            <td>
                Ocupacion: 
            </td>
            <td>
                <?php echo e($est->ocupacion_actual_est); ?>

            </td>
        </tr>
        <tr>
            <td>
                Espacios Disponibles: 
            </td>
            <td>
                <?php echo e($est->capacidad_max_est-$est->ocupacion_actual_est); ?>

            </td>
        </tr>
        <?php if(session('nivel') >= 9): ?>
        <tr>
            <td>
                Nivel: 
            </td>
            <td>
                <?php echo e($est->nivel_est); ?>

            </td>
        </tr>
        <?php endif; ?>
        <?php if(session('nivel') == 10): ?>
        <tr>
            <td>
                Accesibilidad: 
            </td>
            <td>
                <?php $__currentLoopData = $acces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($a->nombre_tipo); ?>, 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>



<?php if(session('nivel') == 10): ?>
<a href="<?php echo e(action('estacionamientoController@edit',['id' => $est->id])); ?>" class="editBtn">editar</a>
<?php endif; ?>
<a href="<?php echo e(action('estacionamientoController@index')); ?>" class="botonRegresar">Regresar</a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\estacionamientoV1\resources\views/Estacionamiento/detalle.blade.php ENDPATH**/ ?>