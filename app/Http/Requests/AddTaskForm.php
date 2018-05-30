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
        'title'=> 'required|min:1|max:200',
        'body' => 'required',
        ];
    }

    public function persist()
    {  

       //$tags = str_replace('#', '', request('tags'));
       $tags = request('tags');
       //$tag_array = explode(',', $tags);
       $tag_array = preg_split('/\s*(,|\.|#)\s*/', $tags);
       //die();
       //dd($tag_array);

        $task = Task::create([
            'title'=> request('title'),
            'body' => request('body'),
            'user_id'=> auth()->id()
        ]);

        if($tag_array[0]=='') return;
        
        foreach ($tag_array as $tag) {
            $singleTag = Tag::firstOrNew(['name' => $tag]);
            if($singleTag->exists) continue;

            $singleTag->fill([
                'name' => $tag,
            ])->save();
        }

        foreach ($tag_array as $tag) {
            $tag_id = Tag::where('name', $tag)->first();
            $task->tags()->attach($tag_id->id);
            //var_dump($tag_id->id);
        }
    }
}
