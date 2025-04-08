<?php

namespace Modules\Users\Services;

use Modules\Users\DTOs\RegisterUserDTO;
use Modules\Users\Interfaces\UserInterface;

class UserService
{
    protected UserInterface $userRepository;
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(RegisterUserDTO $dto)
    {
        return $this->userRepository->create($dto->toArray());
    }

    public function updateUser(array $data)
    {
        return $this->userRepository->update($data['user_id'], $data);
    }

    public function deleteUser(int $id)
    {
        return $this->userRepository->delete($id);
    }
}
