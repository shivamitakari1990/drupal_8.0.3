<?php

/**
 * @file
 * Contains \Drupal\custom_blocks\Controller\CustomBlocksController.
 */

namespace Drupal\custom_blocks\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;

/**
 * Implements basic concepts of Drupal 8.
 */
class CustomBlocksController extends ControllerBase {
  /**
   * Defines function to display "Hello World" message.
   */
  public function hello_world() {
    return array(
      '#markup' => $this->t('<p>Hello World, How are you !</p>'),
    );
  }

  /**
   * Displays page arguments.
   */
  public function paths_with_arguments($first, $second) {
    return ['#markup' => "$first $second"];
  }

  /**
   * Displays optional page arguments.
   */
  public function paths_with_optional_arguments($first, $second) {
    return ['#markup' => "$first $second"];
  }

  /**
   * Displays restricted page arguments.
   */
  public function paths_with_restricted_arguments($first, $second) {
    return ['#markup' => "YES/No : $first, Numeric : $second"];
  }

  /**
   * Upcasting page arguments.
   */
  public function upcasting_entity_parameters(NodeInterface $node) {
    return ['#markup' => "Title : {$node->label()}, Id : {$node->id()}, Bundle : {$node->bundle()}, UUID : {$node->uuid()}, Field Body Yes/No: {$node->hasField('body')}, Field Body Get Value: {$node->get('body')->value}"];
  }

  /**
   * Get, Set, Save node field values.
   */
  public function set_get_save_node_field_value(NodeInterface $node) {
    $node->set('body', 'Hello')->value;
    $node->save();

    return ['#markup' => "Field Body Get Value Post Set: {$node->get('body')->value}"];
  }
}
