<?php
require_once 'config/config.php';
require_once APP_PATH . 'classes/Database.php';
require_once APP_PATH . 'classes/User.php';
require_once APP_PATH . 'classes/Mailer.php';
require_once APP_PATH . 'classes/Template.php';
require_once APP_PATH . 'classes/ResetPassword.php';
require_once APP_PATH . 'classes/Utils.php';
require_once APP_PATH . 'logic/forgetPasswordLogic.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'components/meta.php'; ?>
  <title><?php echo APP_NAME; ?> - Recuperacion</title>
  <?php require_once 'components/css.php'; ?>

</head>

<center>
	 <img src="/images/favico.png" alt="Logo"> 
</center>
<style> 
            body { 
                background-image: url("/images/futuro.jpg");   
            } 
</style> 

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Opciones De Recuperacion</div>
      <div class="card-body">
        <?php if (isset($msg)) : ?>

          <?php echo $utils->alert($msg, "primary", "info-circle"); ?>

        <?php endif; ?>

        <?php if (isset($err)) : ?>

          <?php echo $utils->alert($err, "danger", "times-circle"); ?>

        <?php endif; ?>
        <div class="text-center mb-4">
          <h4>Olvidaste Tu Contraseña?</h4>
          <p>Introduce Tu Email, Sigue Las Instrucciones Para Poder Recuperarla</p>
        </div>
        <form method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="email" id="email" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
              <label for="email">Direccion Email</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Restaurar</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Pagina de inicio</a>
        </div>
      </div>
    </div>
  </div>

  <?php require_once 'components/js.php'; ?>

</body>

</html>