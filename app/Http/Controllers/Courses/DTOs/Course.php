<?php

namespace App\Http\Controllers\Courses\DTOs;

class Course {

    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $description,
        public readonly string $slug,
        public readonly int $price, 
        public readonly string $banner,
    ) {}

    public static function toEloquent() {}

    public static function fromEloquent() {}

    public static function fromRequest() {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->slug,
            'price' => $this->price,
            'banner' => $this->banner
        ];
    }


}