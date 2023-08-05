<?php

namespace Drupal\my_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'hexcode' widget.
 *
 * @FieldWidget(
 *   id = "hexcode_widget",
 *   module = "my_field",
 *   label = @Translation("Hexcode"),
 *   field_types = {
 *     "field_color"
 *   }
 * )
 */
class HexcodeWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {

    $value = $items[$delta]->hexcode ?? '';
    $element['hexcode'] = [
      '#type' => 'textfield',
      '#title' => 'Write Hexcode',
      '#default_value' => $value,
      '#size' => 10,
      '#maxlength' => 10,
    ];
    return $element;
  }

}
