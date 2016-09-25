<?php
namespace Tests;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;

/**
 * Class to test example POST methods in the application
 */

class CustomerPostTest extends BaseTest
{ 

    // Basic test to generate a method not allowed when posting 
    public function testPostHomepageNotAllowed()
    {
        $response = $this->runApp('POST', '/', ['test']);

        $this->assertEquals(405, $response->getStatusCode());
        $this->assertContains('Method not allowed', (string)$response->getBody());
    }


    // We check if adding a new customer works
    public function testAddCustomer()
    {
        $parameters = array('first_name' => 'Alexander', 'last_name' => 'Bulnes', 'email' => 'alexbulnes@mail.com');
        $response = $this->runApp('POST', '/customer/new', $parameters);
        $this->assertEquals(302, $response->getStatusCode());
    }

}