<?php

namespace App\Http\Controllers;
use App\Models\user_info;
use Illuminate\Http\Request;


class User_infoController extends Controller
{
    public function index(){
        $users = user_info::all();
        
        return view('welcome', compact('users'));
    }
}
