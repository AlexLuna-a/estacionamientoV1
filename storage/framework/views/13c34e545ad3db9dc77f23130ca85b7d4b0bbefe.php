<?php $__env->startSection('menu'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('contenido'); ?>
<form action="<?php echo e(action('UsuarioController@loggin_in')); ?>" method="POST" class="formitas">
    <h1>Bienvenido</h1>
    <table class="formTabulado">
        <?php echo e(csrf_field()); ?>

        <tr>
            <td>
                <label for="codigo_user">Codigo</label>
            </td>
            <td>
                <input type="text" name="codigo_user" required minlength="8" maxlength="10" pattern="[0-9]+"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="password_user">Contraseña </label>
            </td>
            <td>
                <input type="password" name="password_user" required minlength="6" />
            </td>
        </tr>
        
        <?php if(session('mensaje')): ?>
        <p class="alerta_error">
            <?php echo e(session('mensaje')); ?>

        </p>
        <?php endif; ?>
    </table>
    <input type="submit" value="Iniciar sesion"/>
</form>


    <p class="cambioLog">
        No tienes una cuenta?
        <a href="<?php echo e(action('UsuarioController@create')); ?>">Registrarse</a>
    </p>
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\estacionamientoV1\resources\views/Usuario/loggin.blade.php ENDPATH**/ ?>