<?php
require_once 'config/config.php';
require_once APP_PATH . 'classes/Database.php';
require_once APP_PATH . 'classes/Settings.php';

$database = new OtterNet\Database();

$s = new OtterNet\Settings($database);

if ($s->getSettingValue("panel_status") == true) {
    echo "True";
} else {
    echo "False";
}
