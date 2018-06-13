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

    public function updateAvatar(Request $request)
    {	
        if(!$request->hasFile('avatar'))
        {
            return redirect()->back();
        }
        request()->validate([
            'avatar' => 'mimes:jpeg,bmp,png'
        ]);

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

    public function updatePassword(Request $request)
    {   
        $user = \Auth::user();
        request()->validate([
            'password' => 'required|min:6|confirmed',
            'password_old' => 'required|min:6'
        ]);

        if (!\Hash::check(request()->password_old, $user->password))
        {
            return back();
        }

        $user->password = bcrypt(request()->password);
        $user->save();

        return back();
    }
}
