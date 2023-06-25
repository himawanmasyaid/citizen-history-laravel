<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();

        // return response()->json($tours);

        return UserResource::collection($users);
    }

    public function show($id) {
        $user = User::findOrFail($id);

        return new UserResource($user);
    }

    // public function store(Request $request) {
        
    //     $validated = $request->validate([
    //         'name' => 'required|max:255',
    //         'username' => 'required|unique:users',
    //         'password' => 'required|min:5|max:255'
    //     ]);

    //     $validated['password'] = bcrypt($validated['password']);

    //     User::create($validated);
    // }

}
