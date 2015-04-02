<?php

namespace Dr;

use Dr\Exceptions;

/**
 * Simple dependency registry which does no injection. 
 * The premise here is a full blown dependency injection solution can 
 * be overkill, and can at times obfuscate otherwise simple and easy 
 * to follow application logic. 
 *  
 * Dr is just a place to put the stuff you will need in your application.
 * 
 * Not particulary orignal but somewhat clean and expandable implementation. 
 * 
 * @author vlaurenzano
 */
class Dr {
  
  /**
   * class instances of dr for when dr is used as a singleton
   * @var type 
   */
  protected static $drception;


  /**
   * Internal Array of container
   * @var type 
   */
  protected $container = array();
  
  /**
   * Registers a value
   * @param string $name
   * @param mixed s
   */
  public function register( $name, $mixed, $singleton = FALSE ){         
    if( is_callable( $mixed ) ){
      if( !$singleton ){
        return $this->registerFactory($name, $mixed);
      }
      return $this->registerSingleton($name, $mixed);
    }  
    return $this->registerValue($name, $mixed);
  }  
  
  /**
   * Registers a value. Can be anything. Will return what is given.
   * 
   * @param type $name
   * @param type $value
   */
  public function registerValue($name, $value){
    $this->container[$name] = new Types\Value($value);
  }
  
  /**
   * 
   * @param type $name
   * @param callable $callable
   * @param type $singeton
   */
  public function registerFactory($name, callable $callable){
    $this->container[$name] = new Types\Factory($callable);
  }
  
  /**
   * Registers a singleton method. Will run once and only return the
   * return value on subsequent calls. 
   * @param type $name
   * @param callable $callable
   */
  public function registerSingleton($name, callable $callable){
    $this->container[$name] = new Types\Singleton($callable);
  }
   
   /**
   * To register and use a singleton, apply name to instance 
   * You will be able to access these named instances of the class
   * You are not required to use this as a singleton, new works, construc is public
   * For some applications this is a  nice to have feature
   * @param type $name
   * @return \Dr\Dr
   */  
  public static function singleton($name){    
    if( !self::$drception ){
      self::$drception = new Dr;
    }
    if( !isset(self::$drception->$name)){
      self::$drception->$name = new Dr;
    }   
    return self::$drception->$name;    
  }  
  
  /**
   * Set will just alias register without the third parameter for singleton
   * @param type $name
   */
  public function __set($name, $value){
    $this->register($name, $value);
  }

  /**
   * Gets an instance using call back 
   * @param mixed $name
   */
  public function __get($name) {
    if( isset($this->container[$name])){
      return $this->container[$name]();      
    } 
    throw new Exceptions\NotFound("The requested service '$name' does not exist");
  }

  /**
   * Allow isset to be called
   * @param string $name
   * @return bool
   */
  public function __isset($name) {
    return isset($this->container[$name]);
  }
  
  /**
   * Don't allow serialization
   * @throws \RuntimeException
   */
  public function __sleep() {
    throw new Exceptions\Exception('Feature not yet implemented');
  }
  
  /**
   * Don't allow unserialization either
   * @throws \RuntimeException
   */
  public function __wakeup() {
    throw new Exceptions\Exception('Feature not yet implemented');
  }
  
}
