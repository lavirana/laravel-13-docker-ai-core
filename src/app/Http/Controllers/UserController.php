<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $allUsers = [];
        DB::table('users')
        ->orderBy('created_at', 'desc')
        ->chunk(2, function ($users) use (&$allUsers) {
            $allUsers[] = $users;
        });
        return view('users.index', compact('allUsers'));
    }

    public function add(){
        return view('users.add');
    }

    public function store(Request $request) {
        // dd($request->all());
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        // User create karke result variable mein save kiya
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        if (!$user) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Something went wrong. User could not be created.');
        }
        return redirect()->route('users.add')->with('success', 'User added successfully.');
    }
}
