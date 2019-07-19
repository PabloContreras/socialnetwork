<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a new post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:255',
        ]);

        $post = new Post();
        if ($request->image) {
            $image = $request->image;
            $filename = time() . '.' . $image->extension();
            Image::make($image)->resize(250, 250)->save(public_path('/uploads/posts/' . $filename));

            $post->image = $filename;
        }else{
            $post->image = 'null';
        }

        
        $post->user_id = auth()->user()->id;
        $post->body = $request->body;
        $post->save();
        return back();
    }
    /**
     * Remove the specified post from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //return $post;
        $post->delete();
        return back();
    }

    /*public function show($id){
        $post = Post::find($id);
        $user_id = Post::find($id)->user_id;
        $user = User::find($user_id);
        return view('auth.show',['post' => $post, 'user' => $user]);
    }*/


    /**
     * Parse usernames from post body.
     *
     * @param  string $postBody
     * @return string
     */
    private function parseUsernames($postBody)
    {
        /*preg_match_all("/@(\\w+)/", $postBody, $usernames);

        if (!empty($usernames)) {
            foreach ($usernames[1] as $username) {
                if (!User::whereUsername($username)->get()->isEmpty()) {
                    $postBody = preg_replace("/(@\\w+)/", '<a href="/' . $username . '">${1}</a>', $postBody);
                    // Notify
                    $recipient = User::whereUsername($username)->first();
                    $sender = Auth::user();
                    Mail::to($recipient)->send(new PostReply($recipient, $sender));
                }
            }
        }*/

        return $postBody;
    }

    /**
     * Parse hash tags from post body.
     *
     * @param  string $postBody
     * @return array
     */
    private function parseTags($postBody)
    {
        /*preg_match_all("/#(\\w+)/", $postBody, $tagnames);

        $tagIds = [];

        if (!empty($tagnames[1])) {
            foreach ($tagnames[1] as $tagname) {
                if (Tag::whereName($tagname)->get()->isEmpty()) {
                    $tag = new Tag();
                    $tag->name = $tagname;
                    $tag->save();
                    $tagIds[] = $tag->id;
                } else {
                    $tag = Tag::whereName($tagname)->first();
                    $tagIds[] = $tag->id;
                }
                $postBody = preg_replace("/(#\\w+)/", '<a href="/tags/' . $tag->id . '">${1}</a>', $postBody);
            }
        }*/

        return $postBody;
    }
}
