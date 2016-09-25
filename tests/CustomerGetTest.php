<?php

namespace Tests;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;

/**
 * Class to test example GET methods in the application
 */

class CustomerGetTest extends BaseTest
{

    /**
     * Test that we get a 'New Customer' message when adding a new customer
     */
    public function testNewCustomer()
    {
        $response = $this->runApp('GET', '/customer/new');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('New Customer', (string)$response->getBody());
    }
    
}