<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
    public function testTodolist()
    {
        $this->withSession([
            'user_id' => 'mizz'
        ])->get('/todolist')->assertSeeText('Todolist - Laravel');
    }
    public function testTodolistFailed()
    {
        $this->get('/')->assertSeeText('Todolist - Laravel');
    }
}
