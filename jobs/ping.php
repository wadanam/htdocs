<?php
require_once '../config/config.php';
require_once APP_PATH . 'classes/Database.php';
require_once APP_PATH . 'classes/Utils.php';
require_once APP_PATH . 'classes/Clients.php';

$database = new OtterNet\Database();

$utils = new OtterNet\Utils();

$clients = new OtterNet\Clients($database, $utils);

$clients->pingClients();
