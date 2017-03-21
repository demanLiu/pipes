<?php
namespace pipes;
use pipes\Contract\Pipe as IPipe;
/**
 * Class Pipe
 * @author  demanliu
 */
abstract class Pipe implements IPipe
{
    /**
     * @var
     */
    protected $payload;
    /**
     * @var string
     */
    protected $strategy;

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
        return $this;
    }

    /**
     * @param $data
     */
    public function setPayload($data)
    {
        $this->payload = $data;
        return $this;
    }

    /**
     * @param callable $strategy
     */
    public function setStrategy(callable $strategy)
    {
        $this->strategy = $strategy;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @return $this
     */
    public function process()
    {
        return $this;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function processInputData($data)
    {

    }
    //TODO merge process and processInputData

}