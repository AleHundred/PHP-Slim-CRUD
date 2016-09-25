<?php
namespace App;

// Customer Mapper Class Models/Setters

class CustomerMapper
{

    private $view;
    private $router;
    protected $pdo;
    private $fieldsArray;

    // Class constructor with view, router, PDO object and column array
    public function __construct($view, $router, $pdo, $fieldsArray)
    {
        $this->view = $view;
        $this->router = $router;
        $this->pdo = $pdo;
        $this->fieldsArray = $fieldsArray;
    }

    // General query to list all customers
    public function getCustomers($request, $response) {
        // Select all fields PDO statement
        $selectStatement = $this->pdo->select($this->fieldsArray)
                                     ->from('customers');
        $stmt = $selectStatement->execute();
        $results = [];
        while($row = $stmt->fetch()) {
            $results[] = new CustomerEntity($row);
        }
        // Get customers template with the resulting rows
        $response = $this->view->render($response, "customers.phtml", ["customers" => $results, "router" => $this->router]);
        return $response;
    }

    // New customer
    public function newCustomer($request, $response) {
        // New customer form template
        $response = $this->view->render($response, "customer_add.phtml");
        return $response;
    }

    // Get customer info
    public function getCustomerById($request, $response, $args) {
        $customer_id = (int)$args['id'];
        // We sanitize the received data
        $customer_id = filter_var($customer_id, FILTER_SANITIZE_STRING);
        // Select customer by id PDO statement
        $selectStatement = $this->pdo->select($this->fieldsArray)
                                     ->from('customers')
                                     ->where('id', '=', $customer_id);
        $stmt = $selectStatement->execute();
        // Generate new Customer Entity
        $customer = new CustomerEntity($stmt->fetch());
        // Get single customer details template
        $response = $this->view->render($response, "customer_detail.phtml", ["customer" => $customer, "router" => $this->router]);
        return $response;
    }

    // Save new customer
    public function save($request, $response, $args) {
        // Parse received fields
        $data = $request->getParsedBody();
        $customer_data = [];
        // Remove ID from the array of columns
        $fieldsInserted = array_shift($this->fieldsArray);
        // Remove ID from the array of columns
        foreach($this->fieldsArray as $fieldData)
        {
            $customer_data[$fieldData] = filter_var($data[$fieldData], FILTER_SANITIZE_STRING);
        }
        // Create new customer entity with data array
        $customer = new CustomerEntity($customer_data);
        // Insert new customer PDO statement
        $insertStatement = $this->pdo->insert($this->fieldsArray)
                                     ->into('customers')
                                     ->values([$customer->getFirstName(), 
                                               $customer->getLastName(), 
                                               $customer->getCompany(), 
                                               $customer->getJobTitle(), 
                                               $customer->getEmail(), 
                                               $customer->getPhone(), 
                                               $customer->getWebsite()]);
        $insertId = $insertStatement->execute();
        // Once the user has been inserted, we redirect to the general listing
        $response = $response->withRedirect("/");
        return $response;
    }

    // Edit a customer
    public function edit($request, $response, $args) {
        $customer_id = (int)$args['id'];
        // We sanitize the received data
        $customer_id = filter_var($customer_id, FILTER_SANITIZE_STRING);
        // Select statement for existing customer
        $selectStatement = $this->pdo->select($this->fieldsArray)
                                     ->from('customers')
                                     ->where('id', '=', $customer_id);
        $stmt = $selectStatement->execute();
        $customer = new CustomerEntity($stmt->fetch());
        // Populate customer update template with existing customer data
        $response = $this->view->render($response, "customer_update.phtml", ["customer" => $customer]);
        return $response;
    }

    // Update a customer
    public function update($request, $response, $args) {
        // Parse received fields
        $data = $request->getParsedBody();
        $customer_data = [];
        $customer_data['id'] = $customer_id = (int)$args['id'];
        // Remove ID from the array of columns
        $fieldsInserted = array_shift($this->fieldsArray);
        // Iterate through the array of columns
        foreach($this->fieldsArray as $fieldData)
        {
            $customer_data[$fieldData] = filter_var($data[$fieldData], FILTER_SANITIZE_STRING);
        }
        $customer = new CustomerEntity($customer_data);
        // Update PDO statement
        $updateStatement = $this->pdo->update(['first_name' => $customer->getFirstName(), 
                                              'last_name' => $customer->getLastName(), 
                                              'company' => $customer->getCompany(), 
                                              'job_title' => $customer->getJobTitle(), 
                                              'email' => $customer->getEmail(), 
                                              'phone' => $customer->getPhone(), 
                                              'website' => $customer->getWebsite()])
                                ->table('customers')
                                ->where('id', '=', $customer->getId());

        $affectedRows = $updateStatement->execute();
        // Redirect to main customer list
        $response = $response->withRedirect("/");
        return $response;
    }

    // Delete a customer
    public function delete($request, $response, $args) {
        $customer_id = (int)$args['id'];
        // Delete statement for given customer
        $deleteStatement = $this->pdo->delete()
                                ->from('customers')
                                ->where('id', '=', $customer_id);
        $affectedRows = $deleteStatement->execute();
        // Redirect to main customer list
        $response = $response->withRedirect("/");
        return $response;
    }

    // Search all customers
    public function search($request, $response, $args) {
        $query = $request->getParam('query');
        // We sanitize the received data
        $query = filter_var($query, FILTER_SANITIZE_STRING);
        $query = "%".$query."%";
        // Select all fields PDO statement
        $selectStatement = $this->pdo->select($this->fieldsArray)
                                     ->from('customers')
                                     ->where('first_name', 'LIKE', $query)
                                     ->orWhere('last_name', 'LIKE', $query)
                                     ->orWhere('email', 'LIKE', $query)
                                     ->orWhere('company', 'LIKE', $query);
        $stmt = $selectStatement->execute();
        $results = [];
        while($row = $stmt->fetch()) {
            $results[] = new CustomerEntity($row);
        }
        // Get customers template with the resulting rows
        $response = $this->view->render($response, "customers.phtml", ["customers" => $results, "router" => $this->router]);
        return $response;
    }


}
