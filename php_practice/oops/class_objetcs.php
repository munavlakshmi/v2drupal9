<?php

class Customer {
    public $name;
    public $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function displayCustomer() {
        return "Name: " . $this->name . ", Email: " . $this->email;
    }
}

// Creating an object of the Customer class
$customer1 = new Customer("John Doe", "john@example.com");
echo $customer1->displayCustomer(); // Outputs: Name: John Doe, Email: john@example.com
