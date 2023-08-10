<?php

namespace Drupal\my_menu\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a form for custom configuration settings related to this module.
 */
class CustomConfigForm extends ConfigFormBase {

  const CONFIGNAME = 'my_menu.settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'my_menu_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function getEditableConfigNames() {
    return [
      static::CONFIGNAME,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::CONFIGNAME);
    $form['budget'] = [
      '#type' => 'number',
      '#title' => 'Budget',
      '#suffix' => 'cr',
      '#default_value' => $config->get('budget'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (preg_match("/^[0-9]+$/", $form_state->getValue('budget')) == FALSE) {
      $form_state->setErrorByName('budget', $this->t('Only numbers are allowed'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config(static::CONFIGNAME);
    $config->set('budget', $form_state->getValue('budget'));
    $config->save();
    $this->messenger()->addStatus($this->t('Your form is submitted'));
    parent::submitForm($form, $form_state);
  }

}
