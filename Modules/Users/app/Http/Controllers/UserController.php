<?php

namespace Modules\Users\Http\Controllers;

use App\Bus\Command;
use App\Bus\CommandBus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected CommandBus $commandBus;
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function store(Request $request)
    {
        $command = new Command('create', $request->all());
        return $this->commandBus->dispatch('user', $command);
    }
}
