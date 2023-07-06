<?php

namespace Drupal\myroute\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Access\AccessResult;

/**
 * This class is used for implementing methods for
 *  practicing routing related tasks provided in the  ticket. 
 */
class MyrouteController extends ControllerBase {

  /**
   * @return array
   * 
   * This method is just for displaying content for a particular route
   */
  public function practicingRoute() {
    
    if(\Drupal::currentUser()->hasPermission('view myroute')) {
      AccessResult::Allowed();
      return [
        '#type' => 'markup',
        '#markup' => 'hello! route'
      ];
    }

    AccessResult::Forbidden();
    
  }

  /**
   * @param mixed $id
   * 
   * This method is used for displaying the  id  fetched from the route.
   * 
   * @return array
   */
  public function getArticleNo($id) {
    return [
      '#type' => 'markup',
      '#markup' =>$this->t('The Article Number is @id', [
        '@id' =>$id
      ])
    ];
  }

}

?>
