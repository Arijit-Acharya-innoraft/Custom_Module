<?php

namespace Drupal\my_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Template\Attribute;

/**
 * Plugin implementation of the 'text color' formatter.
 *
 * @FieldFormatter(
 *   id = "text_color_formatter",
 *   label = @Translation("Text color"),
 *   field_types = {
 *     "field_color"
 *   }
 * )
 */
class TextColorFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {

    $elements = [];
    foreach ($items as $delta => $item) {
      // Storing the color.
      $color = $item->hexcode;
      // Fetching that entity's body value.
      $attributes = new Attribute();
      $attributes->setAttribute('style', 'color: ' . $color);
      $elements[$delta] = [
        '#type' => 'html_tag',
        '#tag' => 'div',
        '#value' => $color,
        '#attributes' => $attributes->toArray(),
      ];
    }

    return $elements;
  }

}
