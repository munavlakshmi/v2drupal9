<?php
// Inheritance allows a class to inherit properties and methods from another class, promoting code reuse.

class User {
    protected $username;

    public function __construct($username) {
        $this->username = $username;
    }

    public function getUsername() {
        return $this->username;
    }

    public function display() {
        return "Username: " . $this->username;
    }
}

class Customer extends User {
    private $email;

    public function __construct($username, $email) {
        $this->username = $username;
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    // Overriding display method
    public function display() {
        return "Username: " . $this->username . ", Email: " . $this->email;
    }
}

$customer = new Customer("johndoe", "john@example.com");
echo $customer->display(); // Outputs: Username: johndoe, Email: john@example.com

?>

