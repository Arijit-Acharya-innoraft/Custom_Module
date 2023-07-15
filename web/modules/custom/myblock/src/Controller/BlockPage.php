<?php

namespace Drupal\myblock\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class to create simple page where a block will be implemented.
 */
class BlockPage extends ControllerBase {

  /**
   * Implements basic page written as hello world.
   *
   * @return array
   *   markup for the page.
   */
  public function pageDisplay() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello World!'),
    ];
  }

}
