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
}
