<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function viewLogin(): Response
    {
        return response()->view('user.login', [
            'title' => 'Login Page'
        ]);
    }

    public function login(Request $request): Response|RedirectResponse
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if (empty($username) || empty($password)) {
            return response()->view('user.login', [
                'title' => 'Login Page',
                'error' => 'Username atau Password tidak boleh kosong',
                "user" => $request->input('username') ?? '',
            ]);
        }

        if ($this->userService->login($username, $password)) {
            $request->session()->put("user", $username);
            return response()->redirectTo('/');
        } else {
            return response()->view("user.login", [
                "title" => "Login",
                "error" => "Username atau Password salah",
                "user" => $request->input('username') ?? '',
            ]);
        }
    }
}