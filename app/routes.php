<?php

// Routes configuration

// GET index route
$app->get('/', 'App\CustomerMapper:getCustomers')->setName('list-customers');

// GET new customer route
$app->get('/customer/new', 'App\CustomerMapper:newCustomer')->setName('new-customer');

// POST add new customer route
$app->post('/customer/new', 'App\CustomerMapper:save')->setName('add-customer');

// GET view customer route
$app->get('/customer/{id}', 'App\CustomerMapper:getCustomerById')->setName('customer-detail');

// GET edit customer route
$app->get('/customer/edit/{id}', 'App\CustomerMapper:edit')->setName('customer-edit');

// POST update customer route
$app->post('/customer/update/{id}', 'App\CustomerMapper:update')->setName('customer-update');

// GET delete customer route
$app->get('/customer/delete/{id}', 'App\CustomerMapper:delete')->setName('customer-delete');

// GET main search
$app->post('/customer/search', 'App\CustomerMapper:search')->setName('customer-search');

// GET application information
$app->get('/info', function () use ($app) {
    echo '<h1>'.json_decode(file_get_contents(__DIR__ . '/../composer.json'))->name.'</h1>';
    echo '<p>'.json_decode(file_get_contents(__DIR__ . '/../composer.json'))->description.'</p>';
});