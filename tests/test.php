<?php 

require __DIR__."/../vendor/autoload.php";

use \omega\omegalog\OmegaLog;


$log = new OmegaLog();
$params = array('test'=>1,'test2'=>2);
$var = "SOME TEXT OR STRING VAR";
$error = "The value is null";
$query="SELECT * FROM TABLE";

$log->emergency('This is a emergency log', $params);
$log->info($params);//no message, only array.
$log->error('Error is: '.$error);
$log->debug('Show me the query mysql '.$query);
$log->critical('Only message');


// [2019-10-02 16:00:57.373841] [::1] [emergency] - This is a emergency log
// Array
// (
//     [test] => 1
//     [test2] => 2
// )
// [2019-10-02 16:00:57.374032] [::1] [info] - 
// Array
// (
//     [test] => 1
//     [test2] => 2
// )
// [2019-10-02 16:00:57.374175] [::1] [error] - Error is: The value is null
// [2019-10-02 16:00:57.374364] [::1] [debug] - Show me the query mysql SELECT * FROM TABLE
// [2019-10-02 16:00:57.374542] [::1] [critical] - Only message
