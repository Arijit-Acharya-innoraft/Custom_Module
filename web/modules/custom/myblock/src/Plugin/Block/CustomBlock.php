<?php

namespace Drupal\myblock\Plugin\Block;

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
   * @return array
   * Method to build the block.
   */
  public function build() {
    // Fetching the current user role.
    $roles = \Drupal::currentUser()->getRoles();
    // Storing all the roles of user in an array 
    foreach ($roles as $role){
      $encoded_tags[] = \Drupal\Component\Utility\Tags::encode($role);
    }
    // Convertingthe array into string.
    $str = implode(', ', $encoded_tags);
    return[
      '#type' => 'markup',
      '#markup' => $this->t('Welcome @role',[
        '@role'=> $str
      ])
    ];
  }
 
}

?>
