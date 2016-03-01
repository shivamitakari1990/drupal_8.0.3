<?php

/**
 * @file
 * Contains \Drupal\custom_blocks\Controller\CustomBlocksController.
 */

namespace Drupal\custom_blocks\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Implements basic concepts of Drupal 8.
 */
class CustomBlocksController extends ControllerBase {
  /**
   * Defines function to display "Hello World" message with All Access.
   */
  public function hello_world_all_access() {
    return array(
      '#markup' => $this->t('<p>Hello World with All Access, How are you !</p>'),
    );
  }

  /**
   * Defines function to display "Hello World" message with Content Access.
   */
  public function hello_world_content_access() {
    return array(
      '#markup' => $this->t('<p>Hello World with Content Access, How are you !</p>'),
    );
  }

  /**
   * Defines function to display "Hello World" message with Admin or Anonymous Role Access.
   */
  public function hello_world_admin_or_anonymous_role_access() {
    return array(
      '#markup' => $this->t('<p>Hello World with Admin or Anonymous Role Access, How are you !</p>'),
    );
  }

  /**
   * Defines function to display "Hello World" message with Node View Access.
   */
  public function hello_world_node_view_access(NodeInterface $node) {
    return array(
      '#markup' => $this->t('<p>Hello World with Node View Access, How are you !</p>'),
    );
  }

  /**
   * Defines function to display "Hello World" message with Node Edit Access.
   */
  public function hello_world_node_edit_access(NodeInterface $node) {
    return array(
      '#markup' => $this->t('<p>Hello World with Node Edit Access, How are you !</p>'),
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

  /**
   * Get JSON Response.
   */
  public function json_callback() {
    $return = array();
    $return = array('name' => 'UBI', 'branch' => 'A T Road', 'PIN' => 781001, 'IFSC' => 'UBI0000004');

    return new JsonResponse($return);
  }
}
