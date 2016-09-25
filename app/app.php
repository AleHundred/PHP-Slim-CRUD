<?php

// Get configuration settings
$settings = require 'app/settings.php';

// New Slim app
$app = new \Slim\App($settings);

// Load dependencies
require 'app/dependencies.php';

// Load routes
require 'app/routes.php';