<?php

namespace Drupal\api_data_with_service\Service;

class UserDataService {

  public function fetchData() {
    $url = 'https://fake-json-api.mock.beeceptor.com/users';
    $response = file_get_contents($url);

    if ($response === FALSE) {
      return [];
    }

    // Decode the JSON data into a PHP array
    $data = json_decode($response, true);
    return $data;
  }

  public function getGmailUsers($data) {
    return array_filter($data, function($user) {
      return strpos($user['email'], '@gmail.com') !== false;
    });
  }

  public function sortUsersByName($data, $order = 'asc') {
    usort($data, function($a, $b) use ($order) {
      return $order === 'asc' ? strcmp($a['name'], $b['name']) : strcmp($b['name'], $a['name']);
    });
    return $data;
  }
}
