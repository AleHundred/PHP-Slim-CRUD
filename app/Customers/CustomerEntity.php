<?php
namespace App;

// Customer Entity Class Definition and field getters

class CustomerEntity
{
    protected $id;
    protected $firstName;
    protected $lastName;
    protected $company;
    protected $jobTitle;
    protected $email;
    protected $phone;
    protected $website;

    /**
     * Accept an array of data matching properties of this class
     * and create the class
     *
     * @param array $data The data to use to create
     */

    public function __construct(array $data) {
        if(isset($data['id'])) {
            $this->id = $data['id'];
        }
        $this->firstName = $data['first_name'];
        $this->lastName = $data['last_name'];
        $this->company = $data['company'];
        $this->jobTitle = $data['job_title'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->website = $data['website'];
    }

    public function getId() {
        return $this->id;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getCompany() {
        return $this->company;
    }

    public function getJobTitle() {
        return $this->jobTitle;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getWebsite() {
        return $this->website;
    }
}
