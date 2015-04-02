<?php

namespace Dr\Types;

/**
 * For Primitve Values
 *
 * @author vin
 */
class Value implements SimpleType{
  
  /**
   * The value too store
   * @var mixed 
   */ 
  public $value;
  
  /**
   * Store a value
   * @param type $value
   */
  public function __construct($value){
    $this->value = $value;
  }
  
  /**
   * Return a values
   * @return mixed
   */
  public function __invoke() {
    return $this->value;
  }

}
