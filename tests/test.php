<?php 

require __DIR__."/../vendor/autoload.php";

use \probyte\omegalog\OmegaLog;

$vars = (object)array("tedi"=>"bear");
$log = new OmegaLog();
$params = array('test'=>1,'test2'=>2);
$var = "SOME TEXT OR STRING VAR";
$error = "The value is null";
$query="SELECT * FROM TABLE";

$log->emergency('This is a emergency log', [$params]);
$log->info($params);//no message, only array.
$log->error('Error is: ',[$error]);
$log->debug('Show me the query mysql ',[$query]);
$log->critical('Only message');
$log->error('message',[$params,$vars,$query]);

// [2019-10-08 13:07:39.178133][::1][emergency] This is a emergency log
// Array
// (
//     [test] => 1
//     [test2] => 2
// )
// [2019-10-08 13:07:39.179027][::1][info] 
// Array
// (
//     [test] => 1
//     [test2] => 2
// )
// [2019-10-08 13:07:39.179661][::1][error] Error is: 
// The value is null
// [2019-10-08 13:07:39.180226][::1][debug] Show me the query mysql 
// SELECT * FROM TABLE
// [2019-10-08 13:07:39.180795][::1][critical] Only message
// [2019-10-08 13:07:39.181507][::1][error] message
// Array
// (
//     [test] => 1
//     [test2] => 2
// )
// stdClass Object
// (
//     [tedi] => bear
// )
// SELECT * FROM TABLE


