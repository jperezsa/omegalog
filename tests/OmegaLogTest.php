<?php

use PHPUnit\Framework\TestCase;
use probyte\omegalog\OmegaCore;

class OmegaLogTest extends TestCase
{
    private $omegaCore;

    public function __construct()
    {
        $this->omegaCore =  new OmegaCore();
    }

    public function test_showArray()
    {
        $array = array("tedi"=>"bear");
    
        $this->assertEquals($this->omegaCore->showArray($array),print_r($array, true));

    }

    public function test_showObject()
    {
        $object = (object)array("tedi"=>"bear");

        $this->assertEquals($this->omegaCore->showObject($object),print_r($object, true));

    }

    public function testArraywithArrayandObjectInside(){

        $params = array('array'=>array(),'object'=>(object)array());
        

        $this->assertTrue(is_array($params));
    }

} 
 
