<?php
namespace Dr\Types;
/**
 * Description of DicType
 *
 * @author vin
 */
interface SimpleType {  
  
  /**
   * Constructor should take in value 
   * @param mixeds $value
   */
  public function __construct($value);
  
  /**
   * Invoke should return the value
   * @return mixed
   */
  public function __invoke();
}

