<?php

namespace Modules\Users\DTOs;

use Illuminate\Support\Facades\Hash;

class RegisterUserDTO
{
    public string $name;
    public string $email;
    public string $password;
    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = Hash::make($password);
    }

    public static function fromArray(array $data): self
    {
        return new self($data['name'], $data['email'], $data['password']);
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
