<?php

namespace App;

class WorkflowState
{
    protected $state;

    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    public function getState()
    {
        return $this->state;
    }
}
