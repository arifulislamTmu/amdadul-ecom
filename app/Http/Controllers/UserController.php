<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }
    
    public function user_list()
    {
      $users = User::latest()->get();
      return view('admin.user-list.index', compact('users'));
    }
    

}



