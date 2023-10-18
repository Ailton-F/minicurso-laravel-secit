<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function list()
    {
        return Tag::all();
    }

    public function listById(int $id)
    {
        return Tag::find($id);
    }

    public function create(Request $req)
    {
        $data = $req->all();
        return Tag::create($data);
    }

    public function edit(Request $req, int $id)
    {
        $tag = Tag::find($id);
        $data = $req->all();
        $tag->update($data);
        return $tag;
    }

    public function delete(int $id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return response()->json([], 204);
    }
}
