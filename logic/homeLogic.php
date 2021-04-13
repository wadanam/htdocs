<?php

$client = new OtterNet\Clients($database, $utils);
$allClients = $client->getClients();

$countries = $client->getCountries();

$columns = [
    "ID Bot",
    "Dirección IP",
    "Nombre De Usuario",
    "Privilegios",
    "Pais",
    "OS",
    "Fecha De Instalación",
    "Version",
    "Estatus",
];

$disabled = (empty($allClients)) ? "disabled" : null;


$i = 1;

$toggle = [];

foreach ($columns as $column) {
    $item = sprintf(
        '<a href="#" class="toggle-vis" data-column="%d" data-label-text="%s">%s</a>',
        $i,
        $column,
        $column
    );
    array_push($toggle, $item);
    $i++;
}

// Roles Controller
if (isset($_GET['action'])) {
    $action = $utils->sanitize($_GET['action']);

    if (isset($_GET['msg'])) {
        $msg = $utils->sanitize($_GET['msg']);

        if ($action == "modules") {
            if ($msg == "forbidden") {
                $forbidden_message = $utils->dismissibleAlert(
                    "<b>Error!</b> 	No Tienes Completo Acceso A Este Modulo <b>forbidden</b>.",
                    "danger",
                    "times-circle"
                );
            }
        } elseif ($action == "settings") {
            if ($msg == "forbidden") {
                $forbidden_message = $utils->dismissibleAlert(
                    "<b>Error!</b> Está intentando acceder a la configuración de red. <b>forbidden</b>.",
                    "danger",
                    "times-circle"
                );
            }
        }
    }
}
$page = "home";
