<?php
use pipes\Structure\Pipeline;
use pipes\Pipe;
/**
 * Class PipelineTest
 * @author  demanliu
 */
class PipelineTest extends PHPUnit_Framework_TestCase
{
    public function testProcess(){
        $pipe1 = new Pipe();
        $pipe1->setStrategy(function ($val){return $val+1;});
        $data = [1,2,3,4];
        $pipeline = new Pipeline($data,[$pipe1]);
        $pipeline->process();
        print_r($pipeline->data);
    }
}
