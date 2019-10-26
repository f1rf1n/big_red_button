<?php

namespace Drupal\big_red_button\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormBuilderInterface;
use Drupal\image\Entity\ImageStyle;

/**
 * Class DefaultForm.
 */
class DefaultForm extends FormBase {

  /**
   * Drupal\Core\Form\FormBuilderInterface definition.
   *
   * @var \Drupal\Core\Form\FormBuilderInterface
   */
  protected $formBuilder;

  /**
   * Constructs a new DefaultForm object.
   */
  public function __construct(
    FormBuilderInterface $form_builder
  ) {
    $this->formBuilder = $form_builder;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('form_builder')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'default_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $img = drupal_get_path('module', 'big_red_button') . '/images/bigredbutton.png'; # //images/bigredbutton.png\';
//    kint($img);
    $src = ImageStyle::load('thumbnail')->buildUrl($img);
//    kint($src);
    $form['don_t_push_it'] = [
      '#type' => 'image_button',
      '#src' => $img,
      '#title' => $this->t('Don&#039;t PUSH it'),
      '#description' => $this->t('Button that wipes the stores&#039; products and migrations'),
      '#weight' => '0',
      '#attributes' => [ 'class' => [ 'img-responsive']],
//    ];
//    $form['submit'] = [
//      '#type' => 'submit',
//      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    //  Trump It!
    trumpGate();
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format'?$value['value']:$value));
    }
  }

}
