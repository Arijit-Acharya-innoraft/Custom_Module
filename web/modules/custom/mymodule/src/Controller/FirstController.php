<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * It is a multipurpose utility class, testing simple markups.
 */
class FirstController extends ControllerBase {

  /**
   * Class property of the current user.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $account;

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
   * This is a Constructor,which constructs an account interface object.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Holds details about the user account.
   */
  public function __construct(AccountInterface $account) {
    $this->account = $account;
  }

  /**
   * This is a create method, it retrive data associated with the account.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   Instance of dependency injector.
   *
   * @return object
   *   The created  object.
   */
  public static function create(ContainerInterface $container) {

    return new static(
      $container->get('current_user')
    );
  }

  /**
   * A simple method for displaying the Hello @Username.
   *
   * @return array
   *   A render array to display the hello message with cache tags applied.
   */
  public function showName() {
    $user_name = $this->account->getDisplayName();
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello @username', [
        '@username' => $user_name,
      ]),
    ];
  }

}
