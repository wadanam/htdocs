<?php

session_start();

require_once 'classes/Utils.php';
require_once 'config/environment.php';

$utils = new OtterNet\Utils();

if (session_destroy()) {
    $utils->redirect("login.php");
}
