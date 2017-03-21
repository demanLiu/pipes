<?php
namespace pipes\Actions;
use pipes\Pipe;
class AttachedPipe extends Pipe
{
    protected $effect;

    /**
     * @return mixed
     */
    public function getEffect()
    {
        return $this->effect;
    }

    public function process()
    {
        $this->effect = [];
        foreach ($this->payload as $key => $val ){
            $this->effect[] = call_user_func($this->strategy,$val,$key);
        }
        return $this;

    }
}
