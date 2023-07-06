<?php

namespace Drupal\myroute\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * This class is used for implementing methods which would,
 *  alter routes and change permission.
 */
class ChangeRoute extends RouteSubscriberBase {

  /**
   * @param RouteCollection $collection
   * 
   * This method is used for,
   * altering the routes and changing the permission.
   */
  public function alterRoutes(RouteCollection $collection) {
    $routeName = 'myroute.practicingRoute';
    $route = $collection->get($routeName); 
    if ($route) {
      $route->setPath('/altered_route');
      $route->setRequirement('_role','administrator');
    }
  }

}

?>
