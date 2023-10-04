<?php

namespace Drupal\my_menu\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller for handling menu-related pages.
 */
class FirstController extends ControllerBase {

  /**
   * Callback for the normal menu page.
   *
   * @return array
   *   A render array containing the markup for the normal menu page.
   */
  public function normalMenu() {
    return [
      '#type' => 'markup',
      '#markup' => 'This page is for menu.',
    ];
  }

  /**
   * Callback for a local task menu page.
   *
   * @return array
   *   A render array containing the markup for the local task menu page.
   */
  public function localTask() {
    return [
      '#type' => 'markup',
      '#markup' => 'Used for creating a local task Menu.These are tabs.
       Thesed are local to the displayed page.
       These are mostly used in administrative pages.',
    ];
  }

  /**
   * Callback for a local action menu page.
   *
   * @return array
   *   A render array containing the markup for the local action menu page.
   */
  public function localAction() {
    return [
      '#type' => 'markup',
      '#markup' => 'These are responsible to conduct a action rather than display an information. ',
    ];
  }

  /**
   * Callback for a contextual menu page.
   *
   * @return array
   *   A render array containing the markup for the contextual menu page.
   */
  public function contextualMenu() {
    return [
      '#type' => 'markup',
      '#markup' => 'These are the fields present in the edit/Configuration option.',
    ];
  }

}
