<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    //admin user list

    public function index()
    {
        $users = User::get();
        return view('users.index', compact('users'));
    }

    // user detail
    public function detail($id)
    {
        $user = User::find($id);
        return view('users.detail', compact('user'));
    }
}
