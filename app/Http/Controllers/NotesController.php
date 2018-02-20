<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Task;

use App\Note;

class NotesController extends Controller
{
    public function store(Task $task){

    	request()->validate([
                'body' => 'required',
        ]);

    	Note::create([
    		'body' => request('body'),
    		'task_id' => $task->id,
            'user_id'=> auth()->id()
    	]);

    	return redirect()->back();

    }
}
