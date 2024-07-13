<?php
namespace Drupal\arrays_php\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Component\Utility\NestedArray;



class ArraysController extends ControllerBase {

  public function arrayTypes() {
    // Indexed Array
    $indexed_array = ['Item 1', 'Item 2', 'Item 3'];
    
    $indexed_markup = '<ul>';
    foreach ($indexed_array as $item) {
      $indexed_markup .= '<li>' . $item . '</li>';
    }
    $indexed_markup .= '</ul>';

    // Associative Array
    $associative_array = [
      'name' => 'Alice',
      'age' => 25,
      'location' => 'New York'
    ];

    $associative_markup = '<p><strong>Name:</strong> ' . $associative_array['name'] . '</p>' .
                          '<p><strong>Age:</strong> ' . $associative_array['age'] . '</p>' .
                          '<p><strong>Location:</strong> ' . $associative_array['location'] . '</p>';

    // Multidimensional Array
    $multidimensional_array = [
      ['name' => 'Alice', 'age' => 25, 'location' => 'New York'],
      ['name' => 'Bob', 'age' => 30, 'location' => 'San Francisco'],
      ['name' => 'Charlie', 'age' => 35, 'location' => 'Los Angeles']
    ];

    $multidimensional_markup = '<table><thead><tr><th>Name</th><th>Age</th><th>Location</th></tr></thead><tbody>';
    foreach ($multidimensional_array as $person) {
      $multidimensional_markup .= '<tr><td>' . $person['name'] . '</td>' .
                                  '<td>' . $person['age'] . '</td>' .
                                  '<td>' . $person['location'] . '</td></tr>';
    }
    $multidimensional_markup .= '</tbody></table>';

    // Combine all the markup
    $markup = '<h2>Indexed Array</h2>' . $indexed_markup .
              '<h2>Associative Array</h2>' . $associative_markup .
              '<h2>Multidimensional Array</h2>' . $multidimensional_markup;

    return [
      '#type' => 'markup',
      '#markup' => $markup,
    ];
  }

  public function arrayFunctions() {
    // Array Functions Example
    $array1 = ['a', 'b', 'c'];
    $array2 = ['d', 'e', 'f'];
    
    // 1. array_merge()
    $merged_array = array_merge($array1, $array2);

    // 2. array_filter()
    $array = [1, 2, 3, 4, 5, 6];
    $even_numbers = array_filter($array, function($value) {
      return $value % 2 == 0;
    });

    // 3. array_map()
    $array = [1, 2, 3, 4, 5];
    $squared_array = array_map(function($value) {
      return $value * $value;
    }, $array);

    // 4. array_reduce()
    $array = [1, 2, 3, 4, 5];
    $sum = array_reduce($array, function($carry, $item) {
      return $carry + $item;
    }, 0);

    // 5. array_keys()
    $array = ['name' => 'Alice', 'age' => 25, 'location' => 'New York'];
    $keys = array_keys($array);

    // 6. array_values()
    $array = ['name' => 'Alice', 'age' => 25, 'location' => 'New York'];
    $values = array_values($array);

    // 7. array_search()
    $array = ['a', 'b', 'c', 'd'];
    $key = array_search('c', $array);

    // 8. in_array()
    $array = ['a', 'b', 'c', 'd'];
    $exists = in_array('c', $array);

    // 9. array_key_exists()
    $array = ['name' => 'Alice', 'age' => 25, 'location' => 'New York'];
    $exists = array_key_exists('age', $array);

    // 10. array_column()
    $people = [
      ['id' => 1, 'name' => 'Alice'],
      ['id' => 2, 'name' => 'Bob'],
      ['id' => 3, 'name' => 'Charlie']
    ];
    $names = array_column($people, 'name');

    // 11. array_flip()
    $array = ['a' => 1, 'b' => 2, 'c' => 3];
    $flipped_array = array_flip($array);

    // 12. array_diff()
    $array1 = [1, 2, 3, 4, 5];
    $array2 = [3, 4, 5, 6, 7];
    $diff = array_diff($array1, $array2);

    // 13. array_intersect()
    $array1 = [1, 2, 3, 4, 5];
    $array2 = [3, 4, 5, 6, 7];
    $intersect = array_intersect($array1, $array2);

    // 14. array_merge_recursive()
    $array1 = ['color' => ['favorite' => 'red'], 5];
    $array2 = [10, 'color' => ['favorite' => 'green', 'blue']];
    $merged_recursive_array = array_merge_recursive($array1, $array2);

    // 15. array_reverse()
    $array = [1, 2, 3, 4, 5];
    $reversed_array = array_reverse($array);

    // 16. array_unique()
    $array = [1, 2, 2, 3, 4, 4, 5];
    $unique_array = array_unique($array);

    // 17. array_slice()
    $array = ['a', 'b', 'c', 'd', 'e'];
    $slice = array_slice($array, 2, 2);

    // 18. array_chunk()
    $array = ['a', 'b', 'c', 'd', 'e'];
    $chunks = array_chunk($array, 2);

    // 19. array_fill()
    $filled_array = array_fill(0, 5, 'value');

    // 20. array_pad()
    $array = ['a', 'b', 'c'];
    $padded_array = array_pad($array, 5, 'x');

    // Combine all the markup
    $markup = '<h2>array_merge()</h2><p>' . implode(', ', $merged_array) . '</p>' .
              '<h2>array_filter()</h2><p>' . implode(', ', $even_numbers) . '</p>' .
              '<h2>array_map()</h2><p>' . implode(', ', $squared_array) . '</p>' .
              '<h2>array_reduce()</h2><p>' . $sum . '</p>' .
              '<h2>array_keys()</h2><p>' . implode(', ', $keys) . '</p>' .
              '<h2>array_values()</h2><p>' . implode(', ', $values) . '</p>' .
              '<h2>array_search()</h2><p>Key of "c": ' . $key . '</p>' .
              '<h2>in_array()</h2><p>Exists "c": ' . ($exists ? 'true' : 'false') . '</p>' .
              '<h2>array_key_exists()</h2><p>Exists "age": ' . ($exists ? 'true' : 'false') . '</p>' .
              '<h2>array_column()</h2><p>' . implode(', ', $names) . '</p>' .
              '<h2>array_flip()</h2><p>' . implode(', ', $flipped_array) . '</p>' .
              '<h2>array_diff()</h2><p>' . implode(', ', $diff) . '</p>' .
              '<h2>array_intersect()</h2><p>' . implode(', ', $intersect) . '</p>' .
              '<h2>array_merge_recursive()</h2><p>' . print_r($merged_recursive_array, true) . '</p>' .
              '<h2>array_reverse()</h2><p>' . implode(', ', $reversed_array) . '</p>' .
              '<h2>array_unique()</h2><p>' . implode(', ', $unique_array) . '</p>' .
              '<h2>array_slice()</h2><p>' . implode(', ', $slice) . '</p>' .
              '<h2>array_chunk()</h2><p>' . print_r($chunks, true) . '</p>' .
              '<h2>array_fill()</h2><p>' . implode(', ', $filled_array) . '</p>' .
              '<h2>array_pad()</h2><p>' . implode(', ', $padded_array) . '</p>';

    return [
      '#type' => 'markup',
      '#markup' => $markup,
    ];
  }
  // drupal_array_merge_deep() is deprecated in favor of the NestedArray::mergeDeep() 
  // method in Drupal 8 and later versions, including Drupal 10. 
  // The NestedArray::mergeDeep() method is part of the Drupal\Component\Utility\NestedArray class and should be used instead.

  public function arraymergedeep() {
    // Sample arrays to demonstrate NestedArray::mergeDeep().
    $array1 = [
      'settings' => [
        'color' => 'blue',
        'size' => 'large',
      ],
      'attributes' => [
        'class' => 'my-class',
      ],
    ];

    $array2 = [
      'settings' => [
        'color' => 'red', // This value will override 'blue'
        'weight' => 'heavy', // This value will be added
      ],
      'attributes' => [
        'id' => 'my-id', // This value will be added
      ],
    ];

    // Merging the arrays using NestedArray::mergeDeep().
    $merged_array = NestedArray::mergeDeep($array1, $array2);

    // Generate the output for demonstration.
    $output = '<h2>Merged Array</h2><pre>' . print_r($merged_array, TRUE) . '</pre>';

    return [
      '#type' => 'markup',
      '#markup' => $output,
    ];
  }

  // drupal_map_assoc() has been removed in Drupal 8 and later versions,
  //  and its functionality can be replicated using PHP's native functions array_combine()
  public function mapAssoc() {
    // Sample indexed array.
    $indexed_array = ['apple', 'banana', 'cherry'];

    // Create an associative array using array_combine().
    $assoc_array = array_combine($indexed_array, $indexed_array);

    // Generate the output for demonstration.
    $output = '<h2>Associative Array</h2><pre>' . print_r($assoc_array, TRUE) . '</pre>';

    return [
      '#type' => 'markup',
      '#markup' => $output,
    ];
  }

  public function manipulateNestedArray() {
    // Sample nested array.
    $data = [
      'fruit' => [
        'apple' => [
          'color' => 'red',
          'taste' => 'sweet',
        ],
        'banana' => [
          'color' => 'yellow',
          'taste' => 'sweet',
        ],
      ],
      'vegetable' => [
        'carrot' => [
          'color' => 'orange',
          'taste' => 'sweet',
        ],
        'broccoli' => [
          'color' => 'green',
          'taste' => 'bitter',
        ],
      ],
    ];

    // Example: Retrieving a nested value.
    $value = NestedArray::getValue($data, ['fruit', 'banana', 'color']);

    // Example: Merging multiple nested arrays.
    $array1 = ['a' => ['b' => 1]];
    $array2 = ['a' => ['c' => 2]];
    $mergedArray = NestedArray::mergeDeep([$array1, $array2]);

    // Example: Setting a value in a nested array.
    NestedArray::setValue($data, ['fruit', 'banana', 'color'], 'green');

    // Example: Unsetting a value in a nested array.
    NestedArray::unsetValue($data, ['vegetable', 'broccoli', 'color']);

    // Display initial data structure.
    $output .= '<p>Data before filtering:</p>';
    $output .= '<pre>' . print_r($data, TRUE) . '</pre>';

    // Example: Filtering the nested array.
    $filteredArray = NestedArray::filter($data, function($item) {
      return is_array($item) && isset($item['color']) && $item['color'] == 'red';
    });


    // Example: Checking if keys exist in a nested array.
    $exists = NestedArray::keyExists($data, ['fruit', 'banana', 'shape']);

     

    // Generate output HTML
    $output = '<h2>Nested Array Manipulation</h2>';
    $output .= '<p>Value fetched: ' . htmlspecialchars($value) . '</p>';
    $output .= '<p>Merged array: <pre>' . print_r($mergedArray, TRUE) . '</pre></p>';
    $output .= '<p>Updated data: <pre>' . print_r($data, TRUE) . '</pre></p>';
    $output .= '<p>Unset data: <pre>' . print_r($data, TRUE) . '</pre></p>';
    $output .= '<p>Filtered array: <pre>' . print_r($filteredArray, TRUE) . '</pre></p>';
    $output .= '<p>Key exists: ' . ($exists ? 'true' : 'false') . '</p>';
   

    // Return rendered output
    return [
      '#type' => 'markup',
      '#markup' => $output,
    ];
  }
}

