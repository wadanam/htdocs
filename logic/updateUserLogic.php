<?php

$settings = new OtterNet\Settings($database);

$user_question = $user->getQuestionByUser($data->username);

$questions = $settings->getPreDefinedQuestions();

$page = "update_user";
