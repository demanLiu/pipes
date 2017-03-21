<?php
use pipes\Actions\AttachedPipe;
class AttachedPipeTest extends PHPUnit_Framework_TestCase
{
    /*
     * test array_sum
     */
    public function testProcess(){
        $data =[1,2,3,4];
        $attached_pipe = new AttachedPipe($data);
        $attached_pipe->setStrategy(function($v){return $v;});
        $attached_pipe->process();
        $this->assertEquals(10,array_sum($attached_pipe->getEffect()));
    }
}
