<?php

namespace Drupal\dependency\Services;

use Drupal\Core\Session\AccountProxyInterface;

/**
 * A service class for getting the user role.
 */
class WithService {

  /**
   * Stores user info.
   *
   * @var use Drupal\Core\Session\AccountProxyInterface
   */
  protected $user;

  /**
   * WithService constructor.
   *
   * @param \Drupal\Core\Session\AccountProxyInterface $user
   *   The current user account proxy.
   */
  public function __construct(AccountProxyInterface $user) {
    $this->user = $user;
  }

  /**
   * Get the role of the current user.
   *
   * @return array
   *   An array of roles assigned to the user.
   */
  public function getRole() {
    $role = $this->user->getRoles();
    return $role;
  }

}
