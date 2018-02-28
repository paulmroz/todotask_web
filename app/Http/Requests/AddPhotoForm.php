<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Photo;

class AddPhotoForm extends FormRequest
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
            'name' => 'required',
            'photo' => 'required'
        ];
    }

    public function persist()
    {
            $fileNameWithExt = request()->file('photo')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = request()->file('photo')->getClientOriginalExtension();

            $fileNameToStore = $fileName.'_'. time().'.'.$extension;

            $fileSize = request()->file('photo')->getClientSize();

            $path = request()->file('photo')->storeAs('public/photos', $fileNameToStore);

            

            Photo::create([

                'photo'=> $fileNameToStore,
                'title' => request('name'),
                'size' => $fileSize,
                'description' => request('description')

            ]);
    }
}
