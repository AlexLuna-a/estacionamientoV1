<?php $__env->startSection('contenido'); ?>

<table class="mostrarDatos">
    <thead>
        <tr>
            <td>
                Placa
            </td>
            <td>
                tipo
            </td>
            <td>
                color
            </td>
            <td>
                usuario
            </td>
        </tr>
    </thead>
    <tbody>
<?php $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td>
        <?php echo e($vehiculo->placa_veh); ?>

    </td>
    <td>
        <?php echo e($vehiculo->tipo_veh); ?>

    </td>
    <td>
        <?php echo e($vehiculo->color_veh); ?>

    </td>
    <td>
        <a href="<?php echo e(action('UsuarioController@show', ['us' => $vehiculo->codigo_user] )); ?>"> <?php echo e($vehiculo->codigo_user); ?></a>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\estacionamientoV1\resources\views/Vehiculo/index.blade.php ENDPATH**/ ?>