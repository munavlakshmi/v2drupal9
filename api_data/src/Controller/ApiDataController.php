<?php

namespace Drupal\api_data\Controller;

use Drupal\Core\Controller\ControllerBase;

class ApiDataController extends ControllerBase {

  private function fetchData() {
    $url = 'https://fake-json-api.mock.beeceptor.com/users';
    $response = file_get_contents($url);

    if ($response === FALSE) {
      return [];
    }

    // Decode the JSON data into a PHP array
    $data = json_decode($response, true);
    return $data;
  }

  public function allUsers() {
    $data = $this->fetchData();

    if (empty($data)) {
      return [
        '#type' => 'markup',
        '#markup' => 'Failed to fetch data from the API.',
      ];
    }

    $output = '<table border="1">';
    $output .= '<tr><th>Name</th><th>Company</th><th>Phone Number</th></tr>';
    foreach ($data as $user) {
      $output .= '<tr>';
      $output .= '<td>' . $user['name'] . '</td>';
      $output .= '<td>' . $user['company'] . '</td>';
      $output .= '<td>' . $user['phone'] . '</td>';
      $output .= '</tr>';
    }
    $output .= '</table>';

    return [
      '#type' => 'markup',
      '#markup' => $output,
    ];
  }

  public function gmailUsers() {
    $data = $this->fetchData();

    if (empty($data)) {
      return [
        '#type' => 'markup',
        '#markup' => 'Failed to fetch data from the API.',
      ];
    }

    $output = '<table border="1">';
    $output .= '<tr><th>Name</th><th>Gmail</th></tr>';
    foreach ($data as $user) {
      if (strpos($user['email'], '@gmail.com') !== false) {
        $output .= '<tr>';
        $output .= '<td>' . $user['name'] . '</td>';
        $output .= '<td>' . $user['email'] . '</td>';
        $output .= '</tr>';
      }
    }
    $output .= '</table>';

    return [
      '#type' => 'markup',
      '#markup' => $output,
    ];
  }

  public function usersAscendingSort() {
    $data = $this->fetchData();

    if (empty($data)) {
      return [
        '#type' => 'markup',
        '#markup' => 'Failed to fetch data from the API.',
      ];
    }

    // Sort users by name in ascending order
    usort($data, function($a, $b) {
      return strcmp($a['name'], $b['name']);
    });

    $output = '<table border="1">';
    $output .= '<tr><th>Name</th></tr>';
    foreach ($data as $user) {
      $output .= '<tr>';
      $output .= '<td>' . $user['name'] . '</td>';
      
      $output .= '</tr>';
    }
    $output .= '</table>';

    return [
      '#type' => 'markup',
      '#markup' => $output,
    ];
  }

}
