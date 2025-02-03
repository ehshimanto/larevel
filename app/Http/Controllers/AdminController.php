<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index (){
     return view('admin.dashboard.home');
    }
    public function all (){
        return view('admin.dashboard.all');
       }
}
