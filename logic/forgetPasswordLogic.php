<?php

$tpl = new OtterNet\Template("layouts/template");

$utils = new OtterNet\Utils();

$database = new OtterNet\Database();

$user = new OtterNet\User($database);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = isset($_POST['email']) ? $utils->sanitize($_POST['email']) : null;

    $rp = new OtterNet\ResetPassword($database, $user, $utils, $tpl);

    if (isset($username)) {
        if ($rp->sendMessage($username)) {
            $msg = "Las Instrucciones Se Enviaron A Su Email";
        } else {
            $err = "El Usuario No Existe!";
        }
    } else {
        $err = "Escribe Un Email Valido";
    }
}

$page = "forgetPassword";
