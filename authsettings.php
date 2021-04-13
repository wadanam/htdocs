<?php
require_once 'session.php';
require_once APP_PATH . '/logic/authSettingsLogic.php';
?>
<!DOCTYPE html>
<html>

<head>
	<?php require_once 'components/meta.php'; ?>
	<title><?php echo APP_NAME; ?> - Configuracion 2FA</title>
	<?php require_once 'components/css.php'; ?>
</head>

<body id="page-top">
	<?php require_once 'components/header.php'; ?>
	<div id="wrapper">
		<div id="content-wrapper">
			<div class="container-fluid">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#">Autentificacion De 2 Factores</a>
					</li>
				</ol>
				<div class="card mb-3">
					<div class="card-header">
						<i class="fas fa-user-circle"></i> Configuracion 2FA
					</div>
					<form method="POST" action="includes/updateAuth.php">
						<?php echo $utils->input("csrf", $utils->sanitize($_SESSION['csrf'])); ?>
						<div class="card-body">
							<div class="container container-special">
								<?php require_once 'components/s2famsg.php'; ?>
							</div>
							<div class="container container-special">
								<input type="text" name="username" value="<?php echo ($data->username); ?>" hidden="">
								<?php if ($data->s2fa == false) : ?>
									<div>
										<p>
											2FA es un nivel de seguridad mejorado para su cuenta. Cada vez que inicie sesión, se requerirá un paso adicional en el que deberá ingresar un código único para obtener acceso a su cuenta. Para habilitar 2FA, haga clic en el botón a continuación y descargue la aplicación <b> 2FAS AUTH </b> de Apple Store o Google Play Store.
											<h4>Important</h4>

											Debe escanear el código a continuación con la aplicación. Debe hacer una copia de seguridad del código QR a continuación guardándolo y guardando la clave en un lugar seguro en caso de que pierda su teléfono. No podrá iniciar sesión si no puede proporcionar el código. si deshabilita 2FA y lo vuelve a habilitar, deberá escanear un nuevo código.
										</p>
									</div>
									<div class="text-center">
										<img class="img-fluid justify-content-center rounded" src="<?php echo $qrcode; ?>" />
									</div>
									<div class="form-group pt-2">
										<div class="form-label-group">
											<input class="form-control" type="text" id="secret" name="secret" placeholder="Authentication Secret" value="<?php echo $_SESSION['secret']; ?>" readonly="" />
											<label for="secret">Codigo Secreto</label>
										</div>
									</div>
									<div class="form-group">
										<div class="form-label-group">
											<input class="form-control" maxlength="6" size="6" type="text" id="code" name="code" placeholder="Authentication Code" />
											<label for="code">Codigo De Autentificacion</label>
											<small for="code" class="small">Obten El Codigo En La APP</small>
										</div>
									</div>
									<button type="submit" name="enable" class="btn btn-block btn-primary">Activar 2FA</button>
								<?php else : ?>
									<button type="submit" name="disable" class="btn btn-block btn-danger">Desactivar 2FA</button>
								<?php endif; ?>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>

	</div>
	<?php require_once 'components/footer.php'; ?>
	<?php require_once 'components/js.php'; ?>
</body>

</html>