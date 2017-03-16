<?php
use pipes\Pipe;
/**
 * Class PipeTest
 * @author  demanliu
 */
class PipeTest extends PHPUnit_Framework_TestCase
{
    public function testSetPayload(){
        $pipe = new Pipe();
        $pipe->setPayload([1,2,3,4]);
        $this->assertEquals($pipe->getPayload(),[1,2,3,4]);
    }
    public function testProcess(){
        $pipe = new Pipe();
        $pipe->setPayload([1,2,3,4]);
        $pipe->setStrategy(function ($val){ return $val+1;});
        $this->assertEquals([2,3,4,5],$pipe->process());
    }
}
