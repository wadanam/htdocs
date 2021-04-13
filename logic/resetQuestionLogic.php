<?php
$tpl = new OtterNet\Template("layouts/template");
$utils = new OtterNet\Utils();
$database = new OtterNet\Database();
$user = new OtterNet\User($database);
$settings = new OtterNet\Settings($database);
$questions = $settings->getPreDefinedQuestions();
$page = "resetQuestionPage";
$token = isset($_GET['token']) ? $utils->sanitize($_GET['token']) : null;
$updatePassword = new OtterNet\ResetPassword($database, $user, $utils, $tpl);
if ($updatePassword->isExist($token) == true) {
    $data = $updatePassword->getUserAssignToToken($token);
    $userQuestion = $user->getQuestionByUser($data->username);
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ($utils->sanitize($_POST['answer']) == $userQuestion->answer) {
            $utils->redirect(SITE_URL . "/reset.php?token=$token&answered=true");
        } else {
            $msg = "Answer is incorrect !";
        }
    }
} else {
    $utils->redirect(SITE_URL . "/expire.php");
}
