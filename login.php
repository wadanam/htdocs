<?php
session_start();
require_once 'config/config.php';
require_once APP_PATH . "classes/Database.php";
require_once APP_PATH . 'classes/Settings.php';
require_once APP_PATH . 'classes/User.php';
require_once APP_PATH . 'classes/Auth.php';
require_once APP_PATH . 'classes/Utils.php';
require_once APP_PATH . 'logic/loginLogic.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once 'components/meta.php'; ?>
<title><?php echo APP_NAME; ?> - Control Total</title>
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
      <div class="card-header">Introduce Tus Credenciales</div>
      <div class="card-body">
        <form method="POST" id="login_form" name="login_form">
          <?php if (isset($error)) : ?>

            <?php echo $utils->alert($error, "danger", "times-circle"); ?>

          <?php endif; ?>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="username" class="form-control" name="username" placeholder="Username" required="required" autofocus="autofocus">
              <label for="username">Usuario</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
              <label for="password">Contraseña</label>
            </div>
          </div>
          <div class="align-content-center text-center">
            <?php if ($settings->getSettingValue('recaptcha_status') == true) : ?>
              <div class="form-group">
                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
              </div>
            <?php endif; ?>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Entra</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="forgot-password.php">Recuperacion de Cuenta</a>
        </div>
      </div>
    </div>
  </div>

  <p class="text-center mt-3 text-black">
    <b>Desarrollado por <a href="#"><?php echo APP_NAME ; ?></a><b/>
  </p>

  <?php require_once 'components/js.php'; ?>

  <?php if ($settings->getSettingValue('recaptcha_status') == true) : ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $settings->getSettingValue('recaptchapublic'); ?>"></script>
    <script>
      grecaptcha.ready(function() {
        grecaptcha.execute('<?php echo $settings->getSettingValue('recaptchapublic'); ?>', {
          action: 'login_form'
        }).then(function(token) {
          var recaptchaResponse = document.getElementById('recaptchaResponse');
          recaptchaResponse.value = token;
        });
      });
    </script>
  <?php endif; ?>
</body>

</html>