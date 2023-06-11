<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('dashboard.users.index',[
            'title' => 'User',
            'users' => User::all()
        ]);
    }

    public function create() {
        return view('dashboard.users.create', [
            'title' => "Add New User"
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);


        return redirect('/dashboard/users')->with('success', 'User berhasil ditambahkan');

    }
}
