<?php

namespace Dr\Types;

/**
 * For Primitve Values
 *
 * @author vin
 */
class Singleton implements CallableType {

  /**
   * Method to create new object
   * @var callable $factory method 
   */
  private $singleton;
  protected $reflection;

  /**
   * Takes in callable method to be run when class is invoked 
   * @param \callable $c
   */
  public function __construct(callable $c) {
    $this->singleton = $c;
    $this->reflection = new \ReflectionFunction($c);
  }

  /**
   * On invokation, returns callback method
   * @return type
   */
  public function __invoke() {
    if (is_callable($this->singleton)) {
      $this->singleton = $this->singleton->__invoke();
    }
    return $this->singleton;
  }

}
