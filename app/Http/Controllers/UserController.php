<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
   public function index(){
    $users = User::all();

    return view('user.index' ,[
        'users' => $users
    ]);
   }
}
