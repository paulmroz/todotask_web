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

        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('task.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddTaskForm $form)
    {
        $task = Task::create([
            'title'=> request('title'),
            'body' => request('body'),
            'user_id'=> auth()->id()
        ]);


        $tags = request('tags');
        //Split string with tags into array.
        $tag_array = preg_split('/\s*(,|\.|#)\s*/', $tags);
        //If first element of array equal empty string return.
        if ($tag_array[0]=='') {
            return;
        }
        //Creating tags in Tag table. If tag already exist continue if not create tag.
        foreach ($tag_array as $tag) {
            $singleTag = Tag::firstOrNew(['name' => $tag]);
            if ($singleTag->exists) {
                continue;
            }

            $singleTag->fill([
                'name' => $tag,
            ])->save();
        }
        //Attach tags in pivot table with specific task.
        foreach ($tag_array as $tag) {
            $tag_id = Tag::where('name', $tag)->first();
            $task->tags()->attach($tag_id->id);
        }

        session()->flash('message', 'Task added');

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Task $task)
    {
        if (strlen(request('title')) < 6 || strlen(request('body')) < 6) {
            return redirect()->back();
        }
        $task->title = request('title');
        $task->body = request('body');
        $task->save();

        return response()->json([
            'status' => 'success',
            'title' => $task->title,
            'body' =>  $task->body,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if ($task->user_id === auth()->id()) {
            $task->find($task->id);

            $task->notes()->delete();
            $task->tags()->delete();
            $task->is_deleted = 1;
            $task->save();

            session()->flash('message', 'Your task has been successfully deleted');
        }

        return redirect()->back();
    }
}
