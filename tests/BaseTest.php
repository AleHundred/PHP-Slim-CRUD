<?php

namespace Tests;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;

/**
 * Base class for a test method that runs the application
 */
class BaseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Process the application given a request method and URI
     */
    public function runApp($requestMethod, $requestUri, $requestData = null)
    {
        // Create a mock environment for the test
        $environment = Environment::mock(
            [
                'REQUEST_METHOD' => $requestMethod,
                'REQUEST_URI' => $requestUri
            ]
        );

        // Set up a request object depending on the environment
        $request = Request::createFromEnvironment($environment);

        // If we have request data, add it
        if (isset($requestData)) {
            $request = $request->withParsedBody($requestData);
        }

        // New respnse object
        $response = new Response();

        // Load settings
        $settings = require __DIR__ . '/../app/settings.php';

        // Instantiate the application
        $app = new App($settings);

        // Load dependencies
        require __DIR__ . '/../app/dependencies.php';

        // Load routes
        require __DIR__ . '/../app/routes.php';

        // Process the application
        $response = $app->process($request, $response);

        // Return the response
        return $response;
    }

    // Basic test for listing all customers at the home route
    public function testHomeRouteAllcustomers()
    {
        $response = $this->runApp('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('All Customers', (string)$response->getBody());
        $this->assertNotContains('Page Not Found', (string)$response->getBody());
    }

    // Basic test to get the project information
    public function testInfo()
    {
        $response = $this->runApp('GET', '/info');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Customer CRUD with PHP Slim', (string)$response->getBody());
        $this->assertNotContains('Page Not Found', (string)$response->getBody());
    }

}
