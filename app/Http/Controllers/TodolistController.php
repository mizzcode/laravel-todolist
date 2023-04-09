<?php

namespace App\Http\Controllers;

use App\Services\TodolistService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class TodolistController extends Controller
{
    private TodolistService $todolistService;

    public function __construct(TodolistService $todolistService)
    {
        $this->todolistService = $todolistService;
    }

    public function todolist(): Response
    {
        // get data todolist
        $todolist = $this->todolistService->getTodo();

        return response()->view('todolist.todolist', [
            'title' => 'Todolist - Laravel',
            'todolist' => $todolist,
        ]);
    }

    public function addTodo(Request $request): Response|RedirectResponse
    {
        $todo = $request->input('todo');

        // get data todolist
        $todolist = $this->todolistService->getTodo();

        if (empty($todo)) {
            return response()->view('todolist.todolist', [
                'title' => 'Todolist - Laravel',
                'error' => 'Todo tidak boleh kosong',
                'todolist' => $todolist,
            ]);
        }

        $this->todolistService->saveTodo(uniqid(), $todo);
        return response()->redirectTo('/');
    }

    public function removeTodo(string $id)
    {
        $this->todolistService->removeTodo($id);
        return response()->redirectTo('/');
    }
}
