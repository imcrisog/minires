<?php

declare(strict_types = 1);

namespace App\Http\Controllers\User\DTOs;

use App\Models\User as ModelEUser;
use Illuminate\Http\Request;

class User {

    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $email
    ) {}

    public static function fromRequest(Request $request, ?int $userId): self
    {
        return new self(
            id: $userId,
            name: $request->name,
            email: $request->email
        );
    }

    public static function fromEloquent(ModelEUser $userEloquent): self
    {
        return new self(
            id: $userEloquent->id,
            name: $userEloquent->name,
            email: $userEloquent->email
        );
    }

    public static function toEloquent(self $user): ModelEUser
    {
        $newUser = new ModelEUser();

        $newUser->name = $user->name;
        $newUser->email = $user->email;

        return $newUser;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email
        ];
    }

}