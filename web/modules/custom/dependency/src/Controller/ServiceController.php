<?php

namespace Drupal\dependency\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class implementing page display function.
 */
class ServiceController extends ControllerBase {

  /**
   * A method for displaying content in the page.
   *
   * @return array
   *   Returns 'Hello World' as a markup to the page.
   */
  public function pageDisplay() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello World!'),
    ];
  }

}
