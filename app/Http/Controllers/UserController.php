<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        return User::all();
    }

    public function listById(int $id)
    {
        return User::find($id);
    }

    public function create(Request $req)
    {
        $data = $req->all();
        return User::create($data);
    }

    public function edit(Request $req, int $id)
    {
        $user = User::find($id);
        $data = $req->all();
        $user->update($data);
        return $user;
    }

    public function delete(int $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([], 204);
    }
}
