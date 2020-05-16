<?php $__env->startSection('menu'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<form action="<?php echo e(action('usuarioController@reg_in')); ?>" method="POST" class="formitas">
    <h1>
        <?php if(isset($accion)): ?>
        <?php echo e($accion); ?>

        <?php else: ?>
        Registrate
        <?php endif; ?>
    
    </h1>
    <?php echo e(csrf_field()); ?>

    <p class='alerta_error'><?php echo e(session('mensajeError') ?? ''); ?></p>
    <p class='alerta_exito'><?php echo e(session('mensajeCompleto') ?? ''); ?></p>
    <table class="formTabulado">
        <tr>
            <td>
                <label for="nombre">Nombre(s)</label>
            </td>
            <td>
                <input type="text" name="nombre" required value="<?php echo e($usuario->nombre_user ?? ''); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="apellidoP">Apellido paterno</label>
            </td>
            <td>
                <input type="text" name="apellidoP" required value="<?php echo e($usuario->apellido_p_user ?? ''); ?>"/>
            </td>
        </tr>
        <tr>
            <td><p></p>
                <label for="apellidoM">Apellido Materno</label>
            </td>
            <td>
                <input type="text" name="apellidoM" required value="<?php echo e($usuario->apellido_m_user ?? ''); ?>" />
            </td>
        </tr>
        <tr>
            <td><p></p>
                <label for="tipo">Rol</label>
            </td>
            <td>
                <select name="tipo" required>
                    <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tipo->id); ?>" 
                            <?php if(isset($usuario)): ?>
                                <?php if($usuario->clave_tipo == $tipo->id): ?>
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
                <label for="codigo">Codigo</label>
            </td>
            <td>
                <input type="text" name="codigo_user" required minlength="8" maxlength="10" pattern="[0-9]+" value="<?php echo e($usuario->id ?? ''); ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="password">Contraseña </label>
            </td>
            <td>
                <input type="password" name="password" required value="<?php echo e($usuario->password_user ?? ''); ?>"/>
            </td>
        </tr>
        <p class="alerta_error"><?php echo e(session('mensaje')->vacios ?? ''); ?></p>
        <p class="alerta_error"><?php echo e(session('mensaje')->idRepetido ?? ''); ?></p>
        <p class="alerta_error"><?php echo e(session('mensaje')->invalidos ?? ''); ?></p>
    </table>
    <?php if(!isset($usuario)): ?>
        <input type="submit" value="Resgistrarse"/>
        <p class="cambioLog">
        Ya tienes una cuenta?
        <a href="<?php echo e(action('usuarioController@loggin')); ?>" class="button">Inicia sesion</a>
    </p>
    <?php else: ?>
        <input type="submit" value="Guardar cambios"/>
    <?php endif; ?>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Usuario.masterUsuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\estacionamientoV1\resources\views/usuario/formCU.blade.php ENDPATH**/ ?>