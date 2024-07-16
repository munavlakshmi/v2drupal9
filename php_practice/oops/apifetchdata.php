<?php

class UserFetcher {
    private $users = [];

    public function fetchData() {
        $url = 'https://fake-json-api.mock.beeceptor.com/users';
        $response = file_get_contents($url);

        if ($response === FALSE) {
            $this->users = [];
            return;
        }

        // Decode the JSON data into a PHP array
        $this->users = json_decode($response, true);
    }

    public function displayAllUsers() {
        echo "<h2>All Users:</h2>";
        if (!empty($this->users)) {
            foreach ($this->users as $user) {
                echo "Name: " . $user['name'] . "<br>";
                echo "Company: " . $user['company'] . "<br>";
                echo "Phone: " . $user['phone'] . "<br><br>";
            }
        } else {
            echo "No users found.";
        }
    }

    public function displayGmailUsers() {
        echo "<h2>Users with Gmail Addresses:</h2>";
        if (!empty($this->users)) {
            foreach ($this->users as $user) {
                if (strpos($user['email'], '@gmail.com') !== false) {
                    echo "Name: " . $user['name'] . "<br>";
                    echo "Email: " . $user['email'] . "<br>";
                }
            }
        } else {
            echo "No users with gmail.com email addresses found.";
        }
    }

    public function displayUsersSortedByName() {
        echo "<h2>All Users Ascending by Username:</h2>";
        usort($this->users, function($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        foreach ($this->users as $user) {
            echo "Name: " . $user['name'] . "<br>";
        }
    }
}

$userFetcher = new UserFetcher();
$userFetcher->fetchData();
$userFetcher->displayAllUsers();
$userFetcher->displayGmailUsers();
$userFetcher->displayUsersSortedByName();