<?php
namespace pipes\Structure;
use pipes\Pipe;
class MergePipe
{
    public $pipes;
    function __construct($pipe)
    {

    }
    public function setPipes(array $pipes)
    {
        $this->pipes = $pipes;
    }
    public function addPipes(Pipe $pipe)
    {
        $this->pipes[] = $pipe;
    }
    public function process()
    {
        foreach ($this->pipes as $pipe){
            $pipe->getPayload();
        }
    }


}
