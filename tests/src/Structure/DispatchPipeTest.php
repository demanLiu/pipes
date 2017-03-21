<?php
use pipes\Actions\TransformPipe as Pipe;
use pipes\Structure\DispatchPipe;
class DispatchPipeTest extends PHPUnit_Framework_TestCase
{
    public function testProcess(){
        $a = [1,2,3,4];
        $pipe1 = new Pipe();
        $pipe1->setStrategy(function ($val){return $val+1;});
        $pipe2 = new Pipe();
        $pipe2->setStrategy(function ($val){return $val*2;});
        $map = [
            'add'=>[0,3],
            'multi'=>[1,2]
        ];
        $pipes = [
            'add' => $pipe1,
            'multi'=>$pipe2
        ];
        $dispatch_pipe = new DispatchPipe($a,$pipes);
        $dispatch_pipe->loadMapping($map);
        $dispatch_pipe->process();
        $this->assertEquals([2,5],$dispatch_pipe->getPipePayload('add'));
        $this->assertEquals([4,6],$dispatch_pipe->getPipePayload('multi'));

    }

}
