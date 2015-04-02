<?php

require __DIR__  . '/vendor/autoload.php';

    
 Dr\Dr::singleton('something');
 
 Dr\Dr::singleton('something');



$dr = new Dr\Dr;



//simple value 
$dr->register( 's' , 'ddfdf');

 
echo $dr->s;

echo empty($dr->s);



$dr->register( 's2' , function(){ return 'sss';}, TRUE);

\serialize($dr);

echo $dr->s2;



echo $dr->s2;

\serialize($dr);