<?php
use pipes\Structure\MergePipe;
use pipes\Pipe;
class MergePipeTest extends PHPUnit_Framework_TestCase
{
    public function testProcess(){
        $data = [1,2,3,4];
        $pipe1 = new Pipe();
        $pipe1->setPayload($data);
        $data = [2,4,6,8];
        $pipe2 = new Pipe();
        $pipe2->setPayload($data);
        $mergePipe = new MergePipe([$pipe1,$pipe2]);
        $mergePipe->setStrategy([new Merge(),'merge_arr']);
        $result = $mergePipe->process();
        $this->assertEquals([1,2,3,4,2,4,6,8],$result);
        $mergePipe->setStrategy([new Merge(),'add']);
        $result = $mergePipe->process();
        $this->assertEquals([3,6,9,12],$result);
    }
}
class Merge
{
    public function merge_arr($arr1,$arr2)
    {
        return array_merge($arr1,$arr2);
    }
    public function add($arr1,$arr2)
    {
        $result = [];
        $main_arr = count($arr1)>count($arr2)?$arr1:$arr2;
        $second_arr = ($arr1 == $main_arr)?$arr2:$arr1;
        foreach ($main_arr as $key => $val){
            if(isset($second_arr[$key])){
                $result[] = $val + $second_arr[$key];
            }else{
                $result[] = $val;
            }
        }
        return $result;

    }
}

