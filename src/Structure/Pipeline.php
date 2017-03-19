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
    private $data;
    function __construct($data=[],array $pipes)
    {
        $this->pipes = $pipes;
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
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
           $this->data = $pipe->processInputData($this->data);
       }

    }

    public function getPaths()
    {
        //TODO default enable pipePath
        if(1){

        }
    }
}
