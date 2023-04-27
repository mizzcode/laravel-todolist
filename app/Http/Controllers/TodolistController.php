<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TodolistController extends Controller
{
    public function todolist(): Response
    {
        return response()->view('todolist.todolist', [
            'title' => 'Todolist - Laravel',
            'todolist' => Todolist::all(),
        ]);
    }

    public function addTodo(Request $request)
    {
        $validatedData = $request->validate([
            'todo' => 'required|max:255'
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        Todolist::create($validatedData);

        return response()->redirectToRoute('home');
    }

    public function removeTodo(string $id)
    {
        Todolist::destroy($id);

        return response()->redirectTo('/');
    }
}
