<?php

$smtp = new OtterNet\Mailer($database);

$settings = new OtterNet\Settings($database);

$smtp_types = ["None", "SSL", "TLS"];

$page = "network_settings";
