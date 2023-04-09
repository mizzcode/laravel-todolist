<?php

namespace App\Services;

class UserService
{
    private array $user = [
        "mizz" => "mizz"
    ];

    public function login(string $username, string $password)
    {
        if (!isset($this->user[$username])) {
            return false;
        }
        // ambil password
        $truePassword = $this->user[$username];
        // cek apakah password sama dengan parameter // langsung return
        return $truePassword == $password;
    }
}