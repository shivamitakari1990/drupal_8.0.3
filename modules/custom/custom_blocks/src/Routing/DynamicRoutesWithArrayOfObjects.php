<?php

/**
 * @file
 * Contains \Drupal\custom_blocks\Routing\DynamicRoutesWithArrayOfObjects.
 */


namespace Drupal\custom_blocks\Routing;
use Symfony\Component\Routing\Route;

/**
 * Defines dynamic routes.
 */
class DynamicRoutesWithArrayOfObjects {
  /**
   * {@inheritdoc}
   */
  public function dynamic_routes() {
    $routes = array();
    // Declares a single route under the name 'custom_blocks.hi_world'.
    // Returns an array of Route objects.
    $routes['custom_blocks.hi_world'] = new Route(
      // Path to attach this route to:
      '/hi_world',
      // Route defaults:
      array(
        '_controller' => '\Drupal\custom_blocks\Controller\CustomBlocksController::hello_world_all_access',
        '_title' => 'Hi World'
      ),
      // Route requirements:
      array(
        '_permission'  => 'access content',
      )
    );
    return $routes;
  }
}
