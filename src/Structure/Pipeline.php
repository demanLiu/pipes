<?php
namespace pipes\Structure;
use pipes\Contract\Pipe as IPipe;
use pipes\Pipe;
/**
 * Class Pipeline
 * @author  demanliu
 */
class Pipeline
{
    public $pipes;
    public $data;
    function __construct($data=[],array $pipes)
    {
        $this->pipes = $pipes;
        $this->data = $data;
    }

    public function setPipes(array $pipes)
    {
        $this->pipes = $pipes;
    }

    public function addPipe(Pipe $pipe)
    {
        $this->pipes[] = $pipe;
    }

    public function process()
    {
       foreach ($this->pipes as $pipe){
           $pipe->processInputData($this->data);
       }

    }

    public function getPaths()
    {

    }
}
