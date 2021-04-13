<?php
session_start();
require_once 'config/config.php';
require_once APP_PATH . 'classes/Database.php';
require_once APP_PATH . 'classes/User.php';
require_once APP_PATH . 'classes/Auth.php';
require_once APP_PATH . 'classes/Utils.php';
require_once APP_PATH . 'logic/authLogic.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'components/meta.php'; ?>

  <title><?php echo APP_NAME; ?> - Autentificación</title>
<center>
	 <img src="/images/favico.png" alt="Logo"> 
</center>
<style> 
            body { 
                background-image: url("/images/futuro.jpg");   
            } 
</style> 
  <?php require_once 'components/css.php'; ?>
</head>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Siguiente</div>
      <div class="card-body">
        <form method="POST">
          <?php if (isset($error)) : ?>

            <?php echo $utils->alert($error, "peligro", "times-circle"); ?>

          <?php else : ?>

            <?php echo $utils->alert("Revisa La App De Verificación.", "primary", "info-circle"); ?>

          <?php endif; ?>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="AuthCode" pattern="[0-9]{6}" name="AuthCode" class="form-control" placeholder="Verification Code" required="required">
              <label for="AuthCode">Codigo De Verificación</label>
            </div>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="remberme" name="remberme">
            <label class="custom-control-label" for="remberme">Registrar Dispositivo Por 30 Dias</label>
          </div>
          <div class="pt-3">
            <button type="submit" class="btn btn-primary btn-block">Siguiente</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php require_once 'components/js.php'; ?>

</body>

</html>