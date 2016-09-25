<?php
// Local timezone
date_default_timezone_set('America/Mexico_City');
// Calling composer autoloader
require dirname(__DIR__) . '/vendor/autoload.php';
// Prevent session cookies
ini_set('session.use_cookies', 0);
