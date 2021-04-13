<?php
require_once 'config/config.php';
require_once APP_PATH . 'classes/Utils.php';
require_once APP_PATH . 'logic/expireLogic.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'components/meta.php'; ?>
  <title><?php echo APP_NAME; ?> - LLave Vencida</title>
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
      <div class="card-header">Restauracion De Contraseña</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>LLave Expirada</h4>
        </div>
        <p class="lead text-center">
          Lamentamos las molestias, pero parece que su código no existe o ha caducado.
          restablezca su contraseña nuevamente para generar un nuevo token.
          </br></br>
          Gracias
        </p>
        <div class="text-center">
          <a class="d-block small mt-3" href="forgot-password.php">Recuperacion De Contraseña</a>
          <a class="d-block small" href="login.php">Pagina De Inicio</a>
        </div>
      </div>
    </div>
  </div>

  <?php require_once 'components/js.php'; ?>

</body>

</html>