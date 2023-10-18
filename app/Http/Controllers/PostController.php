<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function list()
    {
        return Post::all()->load('tags');
    }

    public function listById(int $id)
    {
        return Post::find($id);
    }

    public function create(Request $req)
    {
        $data = $req->all();
        return Post::create($data);
    }

    public function edit(Request $req, int $id)
    {
        $post = Post::find($id);
        $data = $req->all();
        $post->update($data);
        return $post;
    }

    public function delete(int $id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json([], 204);
    }

    public function addTags(Request $req, int $id)
    {
        $post = Post::find($id);
        $post->tags()->attach($req->tags);
        return response()->json(['data'=>'tag attached with success'], 200);
    }
}
