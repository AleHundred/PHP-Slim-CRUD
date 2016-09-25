<?php
// DIC configuration
$container = $app->getContainer();

// Database
$container['pdo'] = function ($c) {
    $dsn = 'mysql:host='.$c['settings']['db']['host'].';dbname='.$c['settings']['db']['database'].';charset=utf8';
    $usr = $c['settings']['db']['username'];
    $pwd = $c['settings']['db']['password'];
    $pdo = new \Slim\PDO\Database($dsn, $usr, $pwd);
    return $pdo;
};

// View
$container['view'] = new \Slim\Views\PhpRenderer("templates/");

// Customer Table Fields Array
$container['fieldsArray'] = ['id', 'first_name', 'last_name', 'company', 'job_title', 'email', 'phone', 'website'];

// Customer Controller
$container['App\CustomerMapper'] = function ($c) {
    return new App\CustomerMapper($c['view'], $c['router'], $c['pdo'], $c['fieldsArray']);
};