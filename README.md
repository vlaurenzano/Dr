# Dr

Dr is a dependency registry. Can register simple values, objects, anonymous functions, singletons, etc. 
The premise here is a full blown dependency injection solution if often overkill, and can obfuscate otherwise simple and easy to follow application logic. 

#Usage

##Instantiation 
```php
$dr = new Dr\Dr; //will create a new instance 
$dr = Dr\Dr::Singleton('instanceName'); //will create or return an instance of Dr with the given name 
```

##Registering Values

```php
$dr->register('myName', myValue [,singleton(bool) default FALSE]); //Automatic ( or $dr->myName = myValue );
```

If value is callable, stores the function for execution later. 

If value is callable and marked singleton, will only be called once. The result will be stored and returned. This is for convenience, although you could accomplish a similar result with just a function. 

If value is not callable stores as is.

```php
$dr->registerValue('myName', myValue);

$dr->registerFactory('myName', callable $myCallback); //explicit

$dr->registerSingleton('myName', callable $myCallback); //explicit
```

##Retrieval
```php 
$myValue = $dr->myName
```




