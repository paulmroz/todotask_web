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
            'title'=> 'required|min:6|max:200',
            'body' => 'required|min:6',
        ];
    }
}
