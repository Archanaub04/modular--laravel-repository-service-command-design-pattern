<?php

namespace App\Bus;

class Command
{
    public string $action;
    public array $data;

    public function __construct(string $action, array $data = [])
    {
        $this->action = $action;
        $this->data = $data;
    }
}
