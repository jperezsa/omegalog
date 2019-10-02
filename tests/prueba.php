<?php 

require __DIR__."/../vendor/autoload.php";

use \omega\omegalog\OmegaLog;


$log = new OmegaLog();
$params = array('test'=>1,'test2'=>2);
$query="SELECT * FROM TABLE";

$log->emergency('Esto es un emergencia', $params);


