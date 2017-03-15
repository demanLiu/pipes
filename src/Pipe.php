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
    function __construct()
    {
        $this->payload = [];
        $this->strategy = '';
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
     * @return bool
     */
    public function process()
    {
        return array_walk($this->payload,$this->strategy);
    }


}