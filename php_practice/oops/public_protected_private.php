<?php

// Base class demonstrating different visibility levels
class BaseVisibility {
    // Public property
    public $publicMessage = 'This is a public message.';

    // Protected property
    protected $protectedMessage = 'This is a protected message.';

    // Private property
    private $privateMessage = 'This is a private message.';

    // Public method
    public function getPublicMessage() {
        return $this->publicMessage;
    }

    // Protected method
    protected function getProtectedMessage() {
        return $this->protectedMessage;
    }

    // Private method
    private function getPrivateMessage() {
        return $this->privateMessage;
    }

    // Method to demonstrate accessing protected and private properties within the class
    public function demonstrateAccess() {
        return 'Protected: ' . $this->getProtectedMessage() . ', Private: ' . $this->getPrivateMessage();
    }
}

// Derived class to demonstrate inheritance and access levels
class DerivedVisibility extends BaseVisibility {
    // Method to demonstrate accessing public and protected properties/methods from parent
    public function demonstrateInheritance() {
        // Access public property directly
        $publicMessage = $this->publicMessage;

        // Access protected property directly (allowed in derived class)
        $protectedMessage = $this->protectedMessage;

        // Attempt to access private property directly (not allowed)
        // $privateMessage = $this->privateMessage; // This will cause an error

        // Access protected method directly (allowed in derived class)
        $protectedMethodMessage = $this->getProtectedMessage();

        // Attempt to access private method directly (not allowed)
        // $privateMethodMessage = $this->getPrivateMessage(); // This will cause an error

        return 'Public: ' . $publicMessage . ', Protected: ' . $protectedMessage . ', Protected Method: ' . $protectedMethodMessage;
    }
}

// Instantiate the base class
$base = new BaseVisibility();
echo "Base class access:\n";
echo "Public Message: " . $base->getPublicMessage() . "\n";
echo "Demonstrate Access: " . $base->demonstrateAccess() . "\n";

// Instantiate the derived class
$derived = new DerivedVisibility();
echo "\nDerived class access:\n";
echo $derived->demonstrateInheritance() . "\n";

