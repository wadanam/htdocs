<?php
require_once 'config/config.php';
require_once APP_PATH . 'classes/Database.php';
require_once APP_PATH . 'classes/Utils.php';
require_once APP_PATH . 'classes/Update.php';
require_once APP_PATH . 'classes/User.php';
require_once APP_PATH . 'classes/Settings.php';
require_once APP_PATH . 'logic/updateLogic.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'components/meta.php'; ?>

  <title><?php echo APP_NAME; ?> - Panel De Actualizacion</title>

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
<?php require_once 'components/css.php'; ?>
  <div class="container pt-3">
    <div class="mx-auto mt-5 card card-login">
      <div class="card-header">Actualizando Sistema</div>
      <div class="card-body">
        <form method="POST">
          <?php if (isset($msg)) : ?>
            <?php if ($msg == true) : ?>

              <?php echo $utils->alert("El Panel Fue Actualizado.", "Exitoso", "check-circle"); ?>

            <?php else : ?>

              <?php echo $utils->alert("No Hay Actualizaciones Disponibles.", "Exitoso", "check-circle"); ?>

            <?php endif; ?>
          <?php endif; ?>

          <?php if (isset($error)) : ?>

            <?php echo $utils->alert($error, "danger", "times-circle"); ?>

          <?php endif; ?>

          <?php if (isset($php_alert)) : ?>

            <?php echo $php_alert; ?>

          <?php endif; ?>

          <?php echo $clients_alert; ?>

          <div class="pb-0 text-center alert alert-primary border-primary">
            <p class="lead h2">
              <b>Esta Pagina Se Va A Actualizar A <?php echo APP_NAME; ?> Ultimate</b>
              <p>Version: <?php echo APP_VERSION; ?></p>
              <b>
                <?php foreach ($is_installed as $library) : ?>
                  <?php echo $library['name'] . ": " . $library['status'] . "<br />"; ?>
                <?php endforeach; ?>

                <?php foreach ($is_writable as $folder) : ?>
                  <?php echo $folder['name'] . ": " . $folder['status'] . "<br />"; ?>
                <?php endforeach; ?>
              </b>
              <br />
              <a href="changelogs.txt" class="alert-link">Registros De Actualizacion</a>
            </p>
          </div>
          <button type="submit" class="btn btn-primary btn-block" <?php echo $disabled ?>>
            Iniciar Actualizacion
          </button>
        </form>
      </div>
    </div>
  </div>

  <?php require_once 'components/js.php'; ?>

</body>

</html>