<?php

namespace Drupal\api_data_with_service\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\api_data_with_service\Service\UserDataService;

class ApiDataController extends ControllerBase {

  protected $userDataService;

  public function __construct(UserDataService $userDataService) {
    $this->userDataService = $userDataService;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('api_data_with_service.user_data_service')
    );
  }

  public function allUsers() {
    $data = $this->userDataService->fetchData();

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
      $output .= '<td>' . htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') . '</td>';
      $output .= '<td>' . htmlspecialchars($user['company'], ENT_QUOTES, 'UTF-8') . '</td>';
      $output .= '<td>' . htmlspecialchars($user['phone'], ENT_QUOTES, 'UTF-8') . '</td>';
      $output .= '</tr>';
    }
    $output .= '</table>';

    return [
      '#type' => 'markup',
      '#markup' => $output,
    ];
  }

  public function gmailUsers() {
    $data = $this->userDataService->fetchData();

    if (empty($data)) {
      return [
        '#type' => 'markup',
        '#markup' => 'Failed to fetch data from the API.',
      ];
    }

    $gmailUsers = $this->userDataService->getGmailUsers($data);

    $output = '<table border="1">';
    $output .= '<tr><th>Name</th><th>Gmail</th></tr>';
    foreach ($gmailUsers as $user) {
      $output .= '<tr>';
      $output .= '<td>' . htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') . '</td>';
      $output .= '<td>' . htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') . '</td>';
      $output .= '</tr>';
    }
    $output .= '</table>';

    return [
      '#type' => 'markup',
      '#markup' => $output,
    ];
  }

  public function usersAscendingSort() {
    $data = $this->userDataService->fetchData();

    if (empty($data)) {
      return [
        '#type' => 'markup',
        '#markup' => 'Failed to fetch data from the API.',
      ];
    }

    // Sort users by name in ascending order
    $sortedData = $this->userDataService->sortUsersByName($data, 'asc');

    $output = '<table border="1">';
    $output .= '<tr><th>Name</th></tr>';
    foreach ($sortedData as $user) {
      $output .= '<tr>';
      $output .= '<td>' . htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') . '</td>';
      $output .= '</tr>';
    }
    $output .= '</table>';

    return [
      '#type' => 'markup',
      '#markup' => $output,
    ];
  }

}
