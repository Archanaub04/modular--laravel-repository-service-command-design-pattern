<?php

namespace Modules\Users\Repositories;

use Modules\Users\Interfaces\UserInterface;
use Modules\Users\Models\User;

class UserRepository implements UserInterface
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function findById(int $id)
    {
        return User::find($id);
    }

    public function update(int $id, array $data)
    {
        $user = User::find($id);
        $user->update($data);
        return $user;
    }

    public function delete(int $id)
    {
        return User::destroy($id);
    }
}
