<?php

$database = new OtterNet\Database();
$utils = new OtterNet\Utils();

$settings = new OtterNet\Settings($database);
$auth = new OtterNet\Auth($database, $utils);
$user = new OtterNet\User($database);

/** Lock out time used for brute force protection */

$lockout_time = 10;

/** Check if user is already log in */

if (isset($_SESSION['loggedin'])) {
    $utils->redirect(SITE_URL . "/index.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $utils->sanitize($_POST['username']);
    $password = $utils->sanitize($_POST['password']);

    $loginstatus = $auth->newLogin($username, $password);

    if ($loginstatus == 200) {
        if (isset($_POST['recaptcha_response'])) {
            $recaptcha = new \ReCaptcha\ReCaptcha($settings->getSettingValue('recaptchaprivate'));

            $resp = $recaptcha->setChallengeTimeout(60)
                ->setExpectedAction("login_form")
                ->setScoreThreshold(0.5)
                ->verify($_POST['recaptcha_response'], $_SERVER['REMOTE_ADDR']);

            if ($resp->isSuccess()) {
                $_SESSION['isHuman'] = true;
            } else {
                $_SESSION['isHuman'] = false;
                $error = "Eres Un Robot?";
            }
        }

        if (!isset($error)) {
            session_regenerate_id();

            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;

            if ($user->isTwoFAEnabled($username) == true) {
                $utils->redirect(SITE_URL . "/auth.php");
            } else {
                $_SESSION['OTP'] = true;
                $utils->redirect(SITE_URL . "/index.php");
            }
        }
} elseif ($loginstatus == 401) {
        $error = "Credenciales Incorrectas.";
    } elseif ($loginstatus == 403) {
        $error = "Creias que con fuerza bruta lo lograrias.
        \nIf si esto es correcto vuelve a intentarlo en $lockout_time minutos.";
    } else {
	$error = "Error Desconocido! ";
    }
}

$page = "loginPage";
