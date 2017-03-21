<?php
namespace pipes\Actions;
use pipes\Pipe;
class TransformPipe extends Pipe
{
    /**
     * @return $this
     */
    public function process()
    {
        $this->payload = array_map($this->strategy,$this->payload);
        return $this;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function processInputData($data)
    {
        return array_map($this->strategy,$data);
    }
    //TODO merge process and processInputData

}

