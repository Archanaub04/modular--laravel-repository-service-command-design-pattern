<?php

namespace App\Bus;

use Modules\Users\Handlers\UserCommandHandler;

class CommandBus
{
    protected UserCommandHandler $userHandler;
    public function __construct(UserCommandHandler $userHandler)
    {
        $this->userHandler = $userHandler;
    }
    public function dispatch(string $entity, Command $command)
    {
        switch ($entity) {
            case 'user':
                return $this->userHandler->handle($command);
                // case 'product':
                //     return $this->productHandler->handle($command);
            default:
                throw new \Exception("Unknown entity: $entity");
        }
    }
}
