<?php

namespace Drupal\myblock\Plugin\Block;

use Drupal\Component\Utility\Tags;
use Drupal\Core\Block\BlockBase;

/**
 * Implementing a custom block and displaying the user role.
 *
 * @Block(
 *  id = "first_custom_block",
 *  admin_label = @Translation("First Custom Block"),
 *  category = @Translation("Custom Block")
 *  )
 */
class CustomBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    // Fetching the current user role.
    $roles = \Drupal::currentUser()->getRoles();
    // Storing all the roles of user in an array.
    foreach ($roles as $role) {
      $encoded_tags[] = Tags::encode($role);
    }
    // Convertingthe array into string.
    $str = implode(', ', $encoded_tags);
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Welcome @role', [
        '@role' => $str,
      ]),
    ];
  }

}
