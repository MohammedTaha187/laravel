<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Foundation\Auth\User;

class ApiUserController extends Controller
{
    public function index(){
        $users = User::all();
        return UserResource::collection($users);
        
    }

}
