<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void
    { // panggil setup parent
        parent::setUp();
        // buat object user service
        $this->userService = $this->app->make(UserService::class);
    }

    public function testLoginSuccess()
    {
        self::assertTrue($this->userService->login("mizz", "mizz"));
    }

    public function testLoginFailed()
    {
        self::assertFalse($this->userService->login("mizz", "salah"));
    }

    public function testLoginUserNotFound()
    {
        self::assertFalse($this->userService->login("jani", "mizz"));
    }
}