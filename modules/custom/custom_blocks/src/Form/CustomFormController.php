<?php

/**
 * @file
 * Contains \Drupal\custom_blocks\Form\CustomFormController.
 */

namespace Drupal\custom_blocks\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

# Form API : https://www.drupal.org/node/2117411

# Any time you are creating a form in your site, you can write a use statement for Drupal\Core\Form\FormBase.
# Any time you are creating a configuration form (aka an admin form) you also need to include a use statement for
# Drupal\Core\Form\ConfigFormBase.
# If had a form with a confirm step, like a "Are you sure you want to delete this?" intermediary step, you could extend use
# Drupal\Core\Form\ConfirmFormBase.

# FormInterface is the interface which gives the four methods described below. This interface is implemented by base classes.

# getFormId is where we assign a unique id to the form being created
# buildForm would be used to actually create the form
# validateForm would be used to validate the form
# submitForm would be used to actual submission of the form

# To get the routings related to user, we can check user.routing.yml file. Example : user.page, user.role_add

/**
 * Contribute form.
 */
class CustomFormController extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'custom_form_hello_world';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $extra = NULL) {
    /*$form['title'] = array(
      '#type' => 'textfield',
      '#title' => t('Title'),
    );
    $form['video'] = array(
      '#type' => 'textfield',
      '#title' => t('YouTube Video'),
      '#required' => TRUE,
    );
    $form['agreement'] = array(
      '#type' => 'checkbox',
      '#title' => t('I agree'),
      '#required' => TRUE,
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Submit'),
    );*/
    $form['phone_number'] = array(
      '#type' => 'tel',
      '#title' => $this->t('Your phone number'),
    );
    $form['additional_phone_number'] = array(
      '#type' => 'tel',
      '#title' => $this->t('Additional phone number'),
      '#value' => $extra,
    );
    $form['additional_phone_number2'] = array(
      '#type' => 'tel',
      '#title' => $this->t('Additional phone number2. New values.'),
      '#value' => $extra,
    );
    $form['actions']['#type'] = 'actions';
    /*$form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );*/

    $form['buttons']['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Submit'),
      // Call the formSubmit method on this class.
      '#submit' => array('::formSubmit'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    /*if ($form_state->getValue('title') && strlen($form_state->getValue('title')) < 10) {
      $form_state->setErrorByName('title', $this->t("The title '%title' has less than 10 characters.", array('%title' => $form_state->getValue('title'))));
    }
    if (!UrlHelper::isValid($form_state->getValue('video'), TRUE)) {
      $form_state->setErrorByName('video', $this->t("The video URL '%url' is wrong.", array('%url' => $form_state->getValue('video'))));
    }*/

    if (strlen($form_state->getValue('phone_number')) < 3) {
      $form_state->setErrorByName('phone_number', $this->t('The phone number is too short. Please enter a full phone number.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Displaying data
    /*foreach ($form_state->getValues() as $key => $value) {
      dsm($key . ':' . $value);
    }*/

    drupal_set_message($this->t('Your phone number is @number', array('@number' => $form_state->getValue('phone_number'))));
    //$form_state->setRedirect('user.role_add');
  }

  /**
   *  Custom submit handler.
   */
  public function formSubmit(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      dsm($key . '=>' . $value);
    }
  }
}
