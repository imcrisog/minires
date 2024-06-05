<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Courses\DTOs;

use app\Http\Controllers\Profile\DTOs\Profile;
use App\Models\Course as ModelsCourse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class Course {

    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $description,
        public readonly string $slug,
        public readonly int $price, 
        public readonly string $banner,
        public readonly ?Object $owner,
        public readonly ?array $students
    ) {}

    public static function toEloquent(self $course, int $profileId): ModelsCourse
    {
        $newCourse = new ModelsCourse();

        if ($course->id) {
            $newCourse = ModelsCourse::query()->findOrFail($course->id);
        }

        $newCourse->name = $course->name;
        $newCourse->description = $course->description;
        $newCourse->slug = $course->slug;
        $newCourse->price = $course->price;
        $newCourse->banner = $course->banner;

        $newCourse->profile()->attach($profileId);

        return $newCourse;
    }

    public static function fromEloquent(ModelsCourse $course): self
    {
        return new self(
            id: $course->id,
            name: $course->name,
            description: $course->description,
            slug: $course->slug,
            price: $course->price,
            banner: $course->banner,
            owner: $course->profile,
            students: (array) $course->profiles
        );
    }

    public static function fromRequest(Request $request, ?int $courseId = null): self
    {
        return new self(
            id: $courseId,
            name: $request->name,
            description: $request->description,
            slug: $request->slug,
            price: $request->price,
            banner: $request->banner,
            owner: null,
            students: null
        );
    }

    // public static function fromArray(array $data): self {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->slug,
            'price' => $this->price,
            'banner' => $this->banner,
            'owner' => $this->owner,
            'students' => $this->students
        ];
    }


}