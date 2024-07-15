<?php
// Polymorphism allows objects of different classes to be treated as objects of a common superclass. 
// It is often achieved through method overriding.


class User {
    public function display() {
        return "I am a user.";
    }
}

class Customer extends User {
    public function display() {
        return "I am a customer.";
    }
}

class Admin extends User {
    public function display() {
        return "I am an admin.";
    }
}

$users = [new User(), new Customer(), new Admin()];

foreach ($users as $user) {
    echo $user->display() . "\n";
}
// Outputs:
// I am a user.
// I am a customer.
// I am an admin.
