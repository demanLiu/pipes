<?php

namespace pipes\Contract;
/**
 * Interface pipe
 * @package pipes\Contract
 */

interface Pipe{
    /**
     * @param $data
     * @return mixed
     */
    public function setPayload($data);

    /**
     * @return mixed
     */
    public function process();

    /**
     * @param callable $strategy
     * @return mixed
     */
    public function setStrategy(callable $strategy);

    /**
     * @param $data
     * @return mixed
     */
    public function addPayload($data);

}
