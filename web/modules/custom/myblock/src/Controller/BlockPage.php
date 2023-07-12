<?php

namespace Drupal\myblock\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * This implements a class for,
 *  creating a simple page where a block will be implemented.
 */
class BlockPage extends ControllerBase {

  /**
   * @return array
   *   Implements basic page written as hello world.
   */
  public function pageDisplay() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello World!'),
    ];
  }

}
