<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class UserController extends Controller
{
    public function index()
    {
    	$user = \Auth::user();
    	return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {	
        if(!$request->hasFile('avatar'))
        {
            return redirect()->back();
        }
    	$file = $request->file('avatar');
        $ext = $file->extension();
        $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
        $fileNameToStore = $fileName.time().'.'.$ext;
        $file->storeAs('public/avatars', $fileNameToStore);
    	$user = \Auth::user();
        $oldAvatar = public_path().'/storage/avatars/'.$user->avatar;
        if(file_exists($oldAvatar) && $oldAvatar != public_path().'/storage/avatars/default.jpg')
        {
            //unlink($oldAvatar);
            File::delete($oldAvatar);
        }

        $user->avatar = $fileNameToStore;
        $user->save();

        return redirect()->back();

    }
}
