<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->view('todolist.todolist', [
            'title' => 'Todolist - Laravel',
            'todolists' => Todolist::where('user_id', Auth::user()->id)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'todo' => 'required|max:255'
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        Todolist::create($validatedData);

        return redirect()->route('todolist.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todolist $todolist)
    {
        Todolist::destroy($todolist->id);

        return redirect()->route('todolist.index');
    }
}
