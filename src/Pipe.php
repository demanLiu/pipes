<?php
namespace pipes;
use pipes\Contract\Pipe as IPipe;
/**
 * Class Pipe
 * @author  demanliu
 */
class Pipe implements IPipe
{
    /**
     * @var
     */
    private $payload;
    /**
     * @var string
     */
    private $strategy;

    /**
     * Pipe constructor.
     */
    function __construct($payload=[],$strategy='')
    {
        $this->payload = $payload;
        $this->strategy = $strategy;
    }

    /**
     * @param $data
     */
    public function addPayload($data)
    {
        $this->payload[] = $data;
    }

    /**
     * @param $data
     */
    public function setPayload($data)
    {
        $this->payload = $data;
    }

    /**
     * @param callable $strategy
     */
    public function setStrategy(callable $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @return array
     */
    public function process()
    {
        return array_map($this->strategy,$this->payload);
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