<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function destroy(User $user)
    {
        $userLogin = Auth::id();
        
        if($user->id = $userLogin) {
            return back()->with('error', 'Tidak bisa menghapus user yang sedang login');
        } else {

            User::destroy($user->id);
    
            return redirect('/dashboard/users')->with('success', 'User Berhasil Dihapus');
        }
        
    }
}
