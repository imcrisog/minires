<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    protected $user = [
        'name' => 'TestUser',
        'email' => 'testuser@test.com'
    ];

    public function test_register_page_success(): void
    {
        $response = $this->get(route('auth.register'));

        $response->assertStatus(200);
    }

    public function test_create_user_success(): void
    {
        $this->user += ['password' => 'my-good-password'];

        $this->post(route('auth.store.register'), $this->user)
            ->assertRedirect(route('profile'));

        $this->assertDatabaseHas('users', ['email' => $this->user['email']]);
        $this->assertDatabaseHas('users', ['name' => $this->user['name']]);
    }

    public function test_fail_to_create_user_without_password(): void
    {
        $this->post(route('auth.store.register'), $this->user)
            ->assertSessionHasErrors('password');  
    }
}
