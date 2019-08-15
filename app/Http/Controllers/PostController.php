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
        $post->activo = 0;
        
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


    /**
     * Parse usernames from post body.
     *
     * @param  string $postBody
     * @return string
     */
    private function parseUsernames($postBody)
    {
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

        return $postBody;
    }
    /*
    **          Lógica para administrador
    */
    public function indexForAdmin(){
        $publicaciones = Post::all();
        return view('admin.publicaciones.index', compact('publicaciones'));
    }
    public function destroyForAdmin($id){
        $post = Post::find($id);
        $post->delete();
        return back();
    }
    public function aprobarForAdmin($id){
         $post = Post::find($id);
         $post->activo = 1;
         $post->save();
         return back();
    }
    public function desaprobarForAdmin($id){
         $post = Post::find($id);
         $post->activo = 0;
         $post->save();
         return back();
    }
    public function showForAdmin($id){
        $post = Post::find($id);
        return view('admin.publicaciones.show', compact('post'));
    }

}
