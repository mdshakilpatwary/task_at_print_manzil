<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $users = User::where('role','marchant')->get();
        return view('admin', compact('users'));

    }
}
