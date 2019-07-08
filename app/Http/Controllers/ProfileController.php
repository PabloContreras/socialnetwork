<?php

namespace App\Http\Controllers;

use App\Tag;
use App\User;
use App\Post;
use Auth;
use Illuminate\Http\Request;
use Image;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user profile.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $posts = Post::latest()->paginate(10);
        return view('auth.profile', ['user' => $user, 'posts' => $posts, ]);
    }


    /**
     * Update profile avatar.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateAvatar(Request $request)
    {
        //return $request;

        if ($request) {
            $avatar = $request->avatar;
            $filename = time() . '.' . $avatar->extension();
            //$filename = $request->avatar;
            Image::make($avatar)->resize(250, 250)->save(public_path('/uploads/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
            //return $user;

            return view('auth.profile', compact('user'));
        }
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }
}
