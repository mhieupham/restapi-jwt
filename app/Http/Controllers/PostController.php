<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Model\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        return response()->json(Post::get(),200);
    }
    public function store(PostFormRequest $request){
        $post = Post::create([
            'post_content'=>$request->input('post_content'),
            'post_image'=>$request->input('post_image')
        ]);
        return response()->json($post,201);
    }
    public function show($id)
    {
        return response()->json(Post::findOrFail($id),200);
    }
    public function update(PostFormRequest $request,$id){
        $post = Post::find($id);
        if($post){
            $post->update($request->all());
            return response()->json($post,200);
        }
    }
    public function destroy($id){
        $post = Post::find($id);
        if($post){
            $post->delete();
            return response()->json([
                'success'=>'delete success',
            ],200);
        }
    }

}
