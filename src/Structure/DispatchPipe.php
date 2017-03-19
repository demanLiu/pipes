<?php
namespace pipes\Structure;
class DispatchPipe
{
    public $pipes;
    private $payload;
    private $map;
    function __construct($payload,array $pipes)
    {
        $this->payload = $payload;
        $this->pipes = $pipes;

    }
    public function loadMapping(array $map)
    {
        $this->map = $map;
    }
    public function setPipes(array $pipe)
    {
        $this->pipes = $pipe;
    }
    public function process()
    {
        $temp = $this->payload;
        foreach ($this->map as $pipe_key => $keys) {
            //TODO validate keys
            $data = array_map(function ($v) use ($temp) {
                return $temp[$v];
            }, $keys);
            ($this->pipes[$pipe_key])->setPayload($data)->process();
        }
    }
    public function getPipePayload($pipe_key)
    {
        return $this->pipes[$pipe_key]->getPayload();
    }
}

