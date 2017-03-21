<?php
namespace pipes\Actions;
use pipes\Pipe;
class FilterPipe extends Pipe
{
    public function process()
    {
        foreach ($this->payload as $key => $val ){
            $bool = call_user_func($this->strategy,$val,$key);
            if(!$bool){
                unset($this->payload[$key]);
            }
        }
    }
}
