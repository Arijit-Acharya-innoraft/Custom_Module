<?php

namespace Drupal\my_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Template\Attribute;

/**
 * Plugin implementation of the 'body value color' formatter.
 *
 * @FieldFormatter(
 *   id = "body_value_text_formatter",
 *   label = @Translation("Body Value color"),
 *   field_types = {
 *     "field_color"
 *   }
 * )
 */
class BodyValueFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {

    $elements = [];
    foreach ($items as $delta => $item) {
      // Storing the color.
      $color = $item->hexcode;
      // Storing that particuar entity.
      $entity = $item->getEntity();
      // Fetching that entity's body value.
      if ($entity->body->value) {
        $body_value = $entity->body->value;
      }
      else {
        $body_value = "There is either no body field or the value of the body field is empty";
      }

      $attributes = new Attribute();
      $attributes->setAttribute('style', 'color: ' . $color);
      $elements[$delta] = [
        '#type' => 'html_tag',
        '#tag' => 'div',
        '#value' => $body_value,
        '#attributes' => $attributes->toArray(),
      ];
    }

    return $elements;
  }

}
