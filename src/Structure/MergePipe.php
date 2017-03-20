<?php
namespace pipes\Structure;
use pipes\Pipe;
class MergePipe
{
    public $pipes;
    public $strategy;
    function __construct(array $pipe = [])
    {
        $this->pipes = $pipe;
    }
    public function setPipes(array $pipes)
    {
        $this->pipes = $pipes;
    }
    public function addPipes(Pipe $pipe)
    {
        $this->pipes[] = $pipe;
    }
    public function setStrategy(callable $strategy)
    {
        $this->strategy = $strategy;
    }
    public function process()
    {
        $result = [];
        foreach ($this->pipes as $pipe){
            $result = call_user_func($this->strategy,$result,$pipe->getPayload());
        }
        return $result;
    }


}
