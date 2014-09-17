<?php
namespace Promet\Drupal\Behat;

use Behat\Behat\Context\BehatContext;
use Drupal\DrupalExtension\Context\DrupalSubContextInterface;

abstract class SubContext extends BehatContext implements DrupalSubContextInterface
{
  private $parentContext;

  abstract public static function getAlias();

  public function __construct($parameters) {
    $this->parentContext = $parameters['parent_context'];
  }

  public function __call($name, array $args = array())
  {
    // Allow all calls to assert function against $this to go to PHPUnit.
    if (strpos($name, 'assert') !== FALSE) {
      return $this->$name;
    }
  }
}
