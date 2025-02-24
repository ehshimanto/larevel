<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use carbon\carbon;
use Session;
use Auth;

class RecycleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){

    }
    public function user(){
        
    }
    public function income_category(){
        return view ('admin.recycle.income-category');
    }

    public function income(){
        return view ('admin.recycle.income');
    }
}
