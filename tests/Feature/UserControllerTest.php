<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void
    { // panggil setup parent
        parent::setUp();
        // buat object user service
        $this->userService = $this->app->make(UserService::class);
    }

    public function testViewLogin()
    {
        $this->get('/login')
            ->assertSeeText('Login')
            ->assertSeeText('Username')
            ->assertSeeText('Password');
    }
}