<?php

namespace Drupal\big_red_button\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the big_red_button module.
 */
class DefaultControllerTest extends WebTestBase {


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "big_red_button DefaultController's controller functionality",
      'description' => 'Test Unit for module big_red_button and controller DefaultController.',
      'group' => 'Other',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests big_red_button functionality.
   */
  public function testDefaultController() {
    // Check that the basic functions of module big_red_button.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
