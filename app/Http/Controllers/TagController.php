<?php

namespace App\Http\Controllers;

use App\Tag;

use App\Task;

use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin')->except('index');
        $this->middleware('auth')->only('index');
    }

    public function index(Tag $tag)
    {
        $tasks = $tag->tasks()->where('user_id', auth()->id())->paginate(5);

        //return $tasks;

        //dump($tag->getUserTasksByTags());
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
        ]);

        Tag::create([
            'name' => request('name'),
        ]);

        session()->flash('message', 'Tag successfuly added');

        return redirect()->back();
    }
}
