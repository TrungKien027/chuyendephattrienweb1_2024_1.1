<?php
declare(strict_types=1); // strict mode

require_once 'src/I.php';
require_once 'src/A.php';
require_once 'src/B.php';
require_once 'src/C.php';

class Demo {
    
    public function typeXReturnY(): X {
        echo __FUNCTION__ . "\n";
        return new Y();
    }

}


$demo = new Demo();

$result = $demo->typeIReturnA(); 
var_dump($result);