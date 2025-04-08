<?php

namespace Modules\Users\Handlers;

use App\Bus\Command;
use Modules\Users\DTOs\RegisterUserDTO;
use Modules\Users\Services\UserService;

class UserCommandHandler
{
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function handle(Command $command)
    {
        switch ($command->action) {
            case 'create':
                $dto = RegisterUserDTO::fromArray($command->data);
                return $this->userService->register($dto);
            case 'update':
                return $this->userService->updateUser($command->data);
            case 'delete':
                return $this->userService->deleteUser($command->data['user_id']);
            default:
                throw new \Exception("Invalid action for UserCommandHandler");
        }
    }
}
