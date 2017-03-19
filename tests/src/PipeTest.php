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
        //test1 :strategy is closure
        $pipe->setStrategy(function ($val){ return $val+1;});
        $this->assertEquals([2,3,4,5],$pipe->process());
        //test2 :strategy is non-static function
        $pipe->setStrategy([new Double(),'op']);
        $this->assertEquals([2,4,6,8],$pipe->process());
        //test3 :strategy is static function
        $pipe->setStrategy(['Double','op2']);
        $this->assertEquals([2,4,6,8],$pipe->process());
    }
}

/**
 * Class Double
 * double number include(non-static ,static)
 * @author  demanliu
 */
class Double
{
    function  op($data){
        return 2*$data;
    }
    static function  op2($data){
        return 2*$data;
    }

}