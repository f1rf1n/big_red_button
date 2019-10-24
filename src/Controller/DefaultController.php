<?php

namespace Drupal\big_red_button\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 */
class DefaultController extends ControllerBase {

  /**
   * Press.
   *
   * @return string
   *   Return Hello string.
   */
  public function press() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: press')
    ];
  }

}
