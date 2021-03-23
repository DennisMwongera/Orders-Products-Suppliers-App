<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   public function index() {
    $user = User::all(['id','name','email', 'password']); 
    return response()->json($user);
   }
}
