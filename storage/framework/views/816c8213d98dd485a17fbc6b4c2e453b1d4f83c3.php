<?php $__env->startSection('contenido'); ?>


<?php if(!isset($e)): ?>
<form action="<?php echo e(action('EstacionamientoController@store')); ?>" method="POST" class="formitas">
<?php else: ?>
<form action="<?php echo e(action('EstacionamientoController@update', ['est'=>$e->id])); ?>" method="POST" class="formitas">
    <?php echo e(method_field('PATCH')); ?>

<?php endif; ?>
<h1>
    <?php echo e($accion ?? ''); ?>

</h1>
<?php echo e(csrf_field()); ?>

<p class='alerta_error'><?php echo e(session('mensajeError') ?? ''); ?></p>
<p class='alerta_exito'><?php echo e(session('mensajeCompleto') ?? ''); ?></p>
<table class="formTabulado">
    <tr>
        <td>
            <label for="nombre">Nombre</label>
        </td>
        <td>
            <input type="text" name="nombre" required value="<?php echo e($e->nombre_est ?? ''); ?>"/>
        </td>
    </tr>
    <td>
        <label for="nivel">Accesible desde</label>
    </td>
    <td>
        <select name="nivel" required>
            <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($tipo->nivel_tipo); ?>" 
                    <?php if(isset($e)): ?>
                    <?php if($e->nivel_est == $tipo->nivel_tipo): ?>
                    selected
                    <?php endif; ?>
                    <?php endif; ?>
                    ><?php echo e($tipo->nombre_tipo); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </td>
</tr>
<tr>
    <td>
        <label for="ubicacion">Ubicacion</label>
    </td>
    <td>
        <input type="text" name="ubicacion" value="<?php echo e($e->ubicacion_est ?? ''); ?>"/>
    </td>
</tr>
<tr>
    <td>
        <label for="maxima">capacidad maxima</label>
    </td>
    <td>
        <input type="number" name="maxima"  value="<?php echo e($e->capacidad_max_est ?? ''); ?>"/>
            </td    >
        </tr>
<tr><?php if(!isset($e)): ?>
        <td>
            <label for="actual">Ocupacion actual </label>
        </td>
        <td>
            <input type="number" name="actual"  value="<?php echo e($e->ocupacion_actual_est ?? '0'); ?>"/>
        </td>
        <?php else: ?>
        <td>
            <input type="number" name="actual" hidden value="<?php echo e($e->ocupacion_actual_est ?? ''); ?>"/>
        </td>
        <?php endif; ?>
    <input type="text" name="id" hidden value="<?php echo e($e->id ?? ''); ?>"/>
</tr>
</table>
<?php if(!isset($e)): ?>
<input type="submit" value="Añadir"/>
<?php else: ?>
<input type="submit" value="Guardar cambios"/>
<?php endif; ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\estacionamientoV1\resources\views/Estacionamiento/form.blade.php ENDPATH**/ ?>