<?php

namespace Drupal\my_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implements the hexcode color picker.
 *
 * @FieldType(
 *  id = "field_color",
 *  label = @Translation("Color"),
 *  module = "my_field",
 *  description = @Translation("Demonstrate a field hexcode color picker"),
 *  default_widget = "hexcode_widget",
 *  default_formatter = "text_formatter"
 * )
 */
class FieldColor extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {

    // Columns contains the values that the field will store.
    return [
      'columns' => [
        'hexcode' => [
          'type' => 'varchar',
          'length' => 10,
        ],
      ],
    ];

  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $property = [];
    $property['hexcode'] = DataDefinition::create('string')
      ->setLabel('Hexcode Value');
    return $property;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $hexcode = $this->get('hexcode')->getValue();
    return empty($hexcode);
  }

}
