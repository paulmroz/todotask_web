<?php

namespace App\Http\Requests;

use App\Task;

use App\Tag;

use Illuminate\Foundation\Http\FormRequest;

class AddTaskForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'title'=> 'required|min:5|max:200',
        'body' => 'required',
        ];
    }

    public function persist()
    {  
        $task = Task::create([
            'title'=> request('title'),
            'body' => request('body'),
            'user_id'=> auth()->id()
        ]);

        $tag_first = Tag::where('name', request('tag_first'))->first();
        $tag_second = Tag::where('name', request('tag_second'))->first();
        $tag_third = Tag::where('name', request('tag_third'))->first();

        try{
            $task->tags()->attach($tag_first);
            $task->tags()->attach($tag_second);
            $task->tags()->attach($tag_third);
        }catch (\Illuminate\Database\QueryException $e){
            
        }

    }
}
