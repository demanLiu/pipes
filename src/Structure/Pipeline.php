<?php
namespace pipes\Structure;
use pipes\Contract\Pipe as IPipe;
use pipes\Pipe;
/**
 * Class Pipeline
 * a set of pipes to handle payload
 * @author  demanliu
 */
class Pipeline
{
    public $pipes;
    private $payload;
    function __construct($payload=[],array $pipes)
    {
        $this->pipes = $pipes;
        $this->payload = $payload;
    }

    /**
     * @return array
     */
    public function getPayload(): array
    {
        return $this->payload;
    }

    /**
     * @param array $payload
     */
    public function setPayload(array $payload)
    {
        $this->payload = $payload;
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
           $this->payload = $pipe->processInputData($this->payload);
       }

    }

    public function getPaths()
    {
        //TODO default enable pipePath
        if(1){

        }
    }
}
