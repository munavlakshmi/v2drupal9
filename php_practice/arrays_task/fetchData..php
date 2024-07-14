<?php

function fetchData() {
    $url = 'https://fake-json-api.mock.beeceptor.com/users';
    $response = file_get_contents($url);

    if ($response === FALSE) {
        return [];
    }

    // Decode the JSON data into a PHP array
    $data = json_decode($response, true);

    return $data;
}

$users = fetchData();

echo "<h2>All Users:</h2>";
if (!empty($users)) {
    foreach ($users as $user) {
        echo "Name: " . $user['name'] . "<br>";
        echo "Company: " . $user['company'] . "<br>";
        echo "Phone: " . $user['phone'] . "<br><br>";
    }
} else {
    echo "No users found.";
}

echo "<h2>Users with Gmail Addresses:</h2>";
if (!empty($users)) {
    foreach ($users as $user) {
     // print_r($users);
        if (strpos($user['email'], '@gmail.com') !== false) {
         echo "Name: " . $user['name'] . "<br>";
         echo "gmail: " . $user['email'] . "<br>";
       }
    }
} else {
    echo "No users with gmail.com email addresses found.";
}

echo "<h2>All Users Ascending by Username:</h2>";
// Sort users by name in ascending order
usort($users, function($a, $b) {
 return strcmp($a['name'], $b['name']);
});

foreach ($users as $user) {
 // print_r($user);
  echo "Name: " . $user['name'] . "<br>";

}
$output .= '</table>';
