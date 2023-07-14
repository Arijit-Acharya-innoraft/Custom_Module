<?php

namespace Drupal\myroute\Controller;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines a controller for the Myroute module.
 */
class MyrouteController extends ControllerBase {

  /**
   * The account object for the currently logged-in user.
   *
   * @var Drupal\Core\Session\AccountInterface
   */
  protected $account;

  /**
   * Constructs a MyrouteController object.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The account object for the currently logged-in user.
   */
  public function __construct(AccountInterface $account) {
    $this->account = $account;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('current_user')
    );
  }

  /**
   * Displays a message on the practicing route.
   *
   * @return array
   *   A render array containing the markup for the message.
   */
  public function practicingRoute() {
    if ($this->account->hasPermission('view myroute')) {
      AccessResult::Allowed();
      return [
        '#type' => 'markup',
        '#markup' => 'hello! route',
      ];
    }
    AccessResult::Forbidden();
  }

  /**
   * Displays the article number.
   *
   * @param mixed $id
   *   The ID of the article.
   *
   * @return array
   *   A render array containing the markup for the article number.
   */
  public function getArticleNo($id) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('The Article Number is @id', [
        '@id' => $id,
      ]),
    ];
  }

}
