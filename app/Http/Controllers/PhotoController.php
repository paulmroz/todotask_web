<?php

namespace App\Http\Controllers;

use App\Photo;

use App\Http\Requests\AddPhotoForm;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\
     */

    public function __construct()
    {
        $this->middleware('admin')->except('create');
    }

    public function index()
    {
        $photos = Photo::paginate(10);
        return view('gallery.manage', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photos = Photo::all();
        return view('gallery.index', compact('photos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPhotoForm $request)
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
            'user_id'=> auth()->id(),
            'description' => request('description')

        ]);

        session('message', 'Photo added');

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        if (auth()->user()->admin == true) {
            $photo->find($photo->id);
            $photo->delete();
        }

        if ($photo->user_id == auth()->id()) {
            $photo->find($photo->id);
            $photo->delete();
        }

        return redirect()->back();
    }
}
