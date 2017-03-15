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
}
