<?php
// Abstraction hides complex implementation details and shows only the necessary features of an object. 
// It can be achieved using abstract classes and interfaces.

interface PersonInterface {
    public function getDetails();
}

class Customer implements PersonInterface {
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

$customer5 = new Customer("Bob Smith", "bob@example.com");
echo $customer5->getDetails(); // Outputs: Customer: Bob Smith, Email: bob@example.com



