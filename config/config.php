<?php
// Coloca los datos de tu base de datos
define("DB_HOST", "localhost");
define("DB_USER", "RX8 ");
define("DB_PASS", "QWASZX123");
define("DB_NAME", "OtterNet");

define("ADMIN_EMAIL", "Ingresa Tu Email");

// ( Don't Change );
define("SITE_URL", ""); 
define("APP_NAME", "OtterNet");
define("APP_DEVELOPER", "Woldembren");
define("APP_VERSION", "v1.2.0 ");
define("APP_PATH", dirname(__FILE__, 2) . DIRECTORY_SEPARATOR); 
define("MODULES_PATH", APP_PATH . "modules" . DIRECTORY_SEPARATOR);
define("DATA_SPLITTER", "|BN|");
define("LOGS_PATH", APP_PATH . "php_logs.log");

// Environment Settings
require_once 'environment.php';

// Autoload Composer
require_once APP_PATH . 'vendor/autoload.php';

// Load OtterNet Modules
require_once 'modules.php';
