<?php

namespace App\Http\Controllers;
use App\comments;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id){
        $post = Post::find($id);
        $user_id = Post::find($id)->user_id;
        $user = User::find($user_id);
        //$comments = comments::where('post_id',$post->id)->get();
        $comments = DB::table('comments')
            ->join('users', 'comments.commenter_id', '=', 'users.id')
            ->select('comments.*', 'users.name', 'users.username', 'users.avatar')
            ->distinct()->get();

        //return $comments;
        if (isset($comments)) {
        	return view('auth.show',['post' => $post, 'user' => $user, 'comments' => $comments, ]);
        }
        return view('auth.show',['post' => $post, 'user' => $user]);
        
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required|max:255',
        ]);

        /*$post = Post::create([
            'user_id' => auth()->user()->id,
            'body' => $request->body,
        ]);*/

        $comment = new comments();
        $post= Post::find($id);
        $post_id = $post->id;
        $comment->post_id = $post_id;
        $comment->owner_id = $post->user_id;
        $comment->commenter_id = Auth::id();
        $comment->body = $request->body;

        $comment->save();

        return back();
    }
}
