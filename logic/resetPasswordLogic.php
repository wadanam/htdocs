<?php

$tpl = new OtterNet\Template("layouts/template");
$utils = new OtterNet\Utils();
$database = new OtterNet\Database();
$user = new OtterNet\User($database);
$page = "resetPasswordPage";
$token = $utils->sanitize($_GET['token']);

$updatePassword = new OtterNet\ResetPassword($database, $user, $utils, $tpl);

if ($updatePassword->isExist($token) == true) {
    $data = $updatePassword->getUserAssignToToken($token);
    $question = $user->isQuestionEnabled($data->username);
    $answered = isset($_GET['answered']) ? $utils->sanitize($_GET['answered']) : "false";
    if ($question != false) {
        if ($answered != "true") {
            $utils->redirect(SITE_URL . "/question.php?username=$data->username&token=$token");
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $Password = $utils->sanitize($_POST['password']);
        $confirmPassword = $utils->sanitize($_POST['confirmPassword']);
        if ($Password == $confirmPassword) {
            if ($updatePassword->updatePassword($token, $data->username, $_POST['password'])) {
                $msg = "La Contraseña Ha Sido Actualizada";
            } else {
                $err = "El Tamaño Minimo Es de 8 Caracteres";
            }
        } else {
            $err = "Las Contraseñas no Coinciden";
        }
    }
} else {
    $utils->redirect(SITE_URL . "/expire.php");
}

session_destroy();
