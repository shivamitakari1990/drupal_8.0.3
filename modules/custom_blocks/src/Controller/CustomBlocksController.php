<?php

/**
 * @file
 * Contains \Drupal\custom_blocks\Controller\CustomBlocksController.
 */

namespace Drupal\custom_blocks\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;

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

  public function paths_with_restricted_arguments($first, $second) {
    return ['#markup' => "YES/No : $first, Numeric : $second"];
  }

  public function upcasting_entity_parameters(NodeInterface $node) {
    return ['#markup' => "Title : {$node->label()}, Id : {$node->id()}, Bundle : {$node->bundle()}"];
  }
}
