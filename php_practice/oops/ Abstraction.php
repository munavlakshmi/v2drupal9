<?php
// Abstraction hides complex implementation details and shows only the necessary features of an object. 
// It can be achieved using abstract classes and interfaces.

abstract class Person {
    abstract protected function getDetails();
}

class Customer extends Person {
    private $name;
    private $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getDetails() {
        return "Customer: " . $this->name . ", Email: " . $this->email;
    }
}

$customer4 = new Customer("Alice Johnson", "alice@example.com");
echo $customer4->getDetails(); // Outputs: Customer: Alice Johnson, Email: alice@example.com

