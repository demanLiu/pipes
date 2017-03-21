<?php
use pipes\Actions\FilterPipe;
class FilterPipeTest extends PHPUnit_Framework_TestCase
{
    public function testProcess(){
        $data = [1,2,3,4,5];
        $filter_pipes = new FilterPipe($data);
        $filter_pipes->setStrategy(function($v){return $v%2;});
        $filter_pipes->process();
        $this->assertEquals([1,3,5],$filter_pipes->getPayload());
    }
}
