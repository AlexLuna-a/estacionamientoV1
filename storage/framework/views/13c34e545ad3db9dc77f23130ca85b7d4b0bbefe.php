<?php $__env->startSection('menu'); ?>
##parent-placeholder-252a25667dc7c65fe0e9bf62d474bbab9bab4068##
<?php $__env->stopSection(); ?>



<?php $__env->startSection('contenido'); ?>
<form action="<?php echo e(action('usuarioController@loggin_in')); ?>" method="POST" class="formitas">
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
        <a href="<?php echo e(action('usuarioController@reg')); ?>">Registrarse</a>
    </p>
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Usuario.masterUsuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\estacionamientoV1\resources\views/Usuario/loggin.blade.php ENDPATH**/ ?>