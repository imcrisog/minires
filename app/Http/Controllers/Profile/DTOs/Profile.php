<?php

declare(strict_types = 1);

namespace app\Http\Controllers\Profile\DTOs;

use App\Models\Profile as ModelsProfile;

class Profile {

    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $bio,
        public readonly int $type,
        public readonly string $icon,
        public readonly string $banner,
        public readonly bool $premium
    ) {}

    public static function fromEloquent(ModelsProfile $profile): self
    {
        return new self(
            id: $profile->id,
            name: $profile->name,
            bio: $profile->bio,
            type: $profile->type,
            icon: $profile->icon,
            banner: $profile->banner,
            premium: $profile->premium
        );
    }

}
