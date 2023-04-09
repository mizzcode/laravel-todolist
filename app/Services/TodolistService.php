<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class TodolistService
{
    public function saveTodo(string $id, string $todo)
    {   // jika belum ada session todolist
        if (!Session::exists('todolist')) {
            // maka buat baru key todolist dengan value array kosong
            Session::put('todolist', []);
        }
        // add data to session array
        Session::push('todolist', [
            'id' => $id,
            'todo' => $todo,
        ]);
    }

    public function getTodo()
    {
        // get data session
        return Session::get('todolist', []);
    }

    public function removeTodo(string $id)
    {
        $todolist = Session::get('todolist', []);

        foreach ($todolist as $key => $value) {
            // jika match data id nya. maka hapus
            if ($value['id'] == $id) {
                unset($todolist[$key]);
                break;
            }
        }
        // update data terbaru
        Session::put('todolist', $todolist);
    }
}
