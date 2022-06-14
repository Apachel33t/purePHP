<?php
require_once __DIR__ . "/Autoloader.php";

$autoloader = new Autoloader();

$autoloader->register();

require_once __DIR__ . "/routes/web.php";
