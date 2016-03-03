<?php

/**
 * @file
 * Contains \Drupal\custom_blocks\Routing\DynamicRoutesWithCollectionObject.
 */


namespace Drupal\custom_blocks\Routing;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

/**
 * Defines dynamic routes.
 */
class DynamicRoutesWithCollectionObject {
  /**
   * {@inheritdoc}
   */
  public function dynamic_routing() {
    $route_collection = new RouteCollection();

    $route = new Route(
      // Path to attach this route to:
      '/hey_world',
      // Route defaults:
      array(
        '_controller' => '\Drupal\custom_blocks\Controller\CustomBlocksController::hello_world_all_access',
        '_title' => 'Hey World'
      ),
      // Route requirements:
      array(
        '_permission'  => 'access content',
      )
    );

    // Add the route under the name 'example.content'.
    $route_collection->add('custom_blocks.hey_world', $route);
    return $route_collection;
  }
}
