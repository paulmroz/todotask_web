<?php

namespace App\Http\Controllers;

use App\Task;

use App\Note;

use App\Tag;

use Carbon\Carbon;

use App\Http\Requests\AddTaskForm;

use App\Repositories\TaskRepository;

use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TaskRepository $tasks)
    {   
        $tasks=$tasks->fetchAlluserTask();

        return view('task.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('task.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddTaskForm $form)
    {
        $form->persist();

       /* try{
           $form->persist();
        } catch(Exception $e){
            return 'nie można';
        } */

            session()->flash('message','Task added');

            return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
         return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        if($task->user_id === auth()->id()){

            $task = Task::find($task->id);

            return view('task.edit', compact('task'));

        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $task->title = request('title');
        $task->body = request('body');
        $task->save();
        session()->flash('message', 'Task updated successfully.');
        return redirect('/tasks');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {   

        //Task::where('user_id')

        if ($task->user_id === auth()->id())  {

            $task->find($task->id);

            $task->notes()->delete();

            $task->delete();

            session()->flash('message', 'Your post has been successfully deleted');
        }

        return redirect()->back();
    }
}
