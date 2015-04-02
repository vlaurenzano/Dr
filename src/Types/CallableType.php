<?php
namespace Dr\Types;
/**
 * Description of DrType
 *
 * @author vin
 */
interface CallableType {  
  
  /**
   * Constructor should take in value 
   * @param mixeds $value
   */
  public function __construct(callable $value);
  
  /**
   * Invoke should return the value
   * @return mixed
   */
  public function __invoke();  
  
}

