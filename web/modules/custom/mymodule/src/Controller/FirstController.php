<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;

/**
 * This class is a multipurpose utility class.
 * it is used for testing simple markups,getAccountName function.
 */
class FirstController extends ControllerBase {

  /**
   * A render array to display the hello message.
   *
   * @return array
   *   The form cotent.
   */
  public function simpleContent() {
    return [
      '#type' => 'markup',
      '#markup' => 'hello world',
    ];
  }

  /**
   * A simple method for displaying the Hello @Username.
   *
   * @param string $name
   *   It takes the name from the url.
   *
   * @return array
   *   A render array to display the hello message
   */
  public function greetings($name) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('HELLO @name !', [
        '@name' => $name,
      ]),
    ];
  }

  /**
   * A simple method for displaying the Hello @Username.
   *
   * @return array
   *   A render array to display the hello message with cache tags applied.
   */
  public function showName() {
    $user = User::load(\Drupal::currentUser()->id());
    $userName = $user->getAccountName();
    return [
      '#type' => 'markup',
      '#markup' => ('Hello ' . $userName),
      '#cache' => [
        'tags' => $user->getCacheTags(),
      ],
    ];
  }

}
