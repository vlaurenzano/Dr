<?php

namespace Dr\Types;

/**
 * For Primitve Values
 *
 * @author vin
 */
class Factory implements CallableType {
  
  /**
   * Method to create new object
   * @var callable $factory method 
   */
  private $factoryMethod;
  
  /**
   * Takes in callable method to be run when class is invoked 
   * @param \callable $c
   */
  public function __construct( callable $c){
    $this->factoryMethod = $c;
  }
  
  /**
   * On incokation, returns callback method
   * @return type
   */
  public function __invoke(){
    return $this->factoryMethod->__invoke();
  }
}
