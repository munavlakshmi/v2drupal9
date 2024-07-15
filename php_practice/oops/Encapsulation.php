<?php

// Encapsulation is the concept of wrapping data (properties) and methods (functions) 
// together as a single unit (class) and restricting access to some of the object's components.
// This is done to prevent outside interference and misuse of the data.

// Encapsulation is implemented using access modifiers: public, protected, and private.

class Customer {
    private $name;
    private $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}

$customer2 = new Customer("Jane Smith", "jane@example.com");
echo $customer2->getName(); // Outputs: Jane Smith
$customer2->setEmail("jane.new@example.com");
echo $customer2->getEmail(); // Outputs: jane.new@example.com

