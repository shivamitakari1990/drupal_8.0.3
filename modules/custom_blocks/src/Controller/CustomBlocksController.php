<?php

/**
 * @file
 * Contains \Drupal\custom_blocks\Controller\CustomBlocksController.
 */

namespace Drupal\custom_blocks\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 *
 */
class CustomBlocksController extends ControllerBase {
  public function hello_world() {
    return array(
      '#markup' => $this->t('<p>Hello World, How are you !</p>'),
    );
  }

  public function paths_with_arguments($first, $second) {
    return ['#markup' => "$first $second"];
  }

  public function paths_with_optional_arguments($first, $second) {
    return ['#markup' => "$first $second"];
  }
}
