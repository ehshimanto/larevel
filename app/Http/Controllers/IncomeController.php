<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index (){
        //return view('admin.dashboard.home');
               }
        
               public function add (){
               // return view('admin.dashboard.home');
               }
               public function edit(){
                // return view('admin.dashboard.home');
                }
                public function view (){
                    // return view('admin.dashboard.home');
                    }
                    public function insert (){
                        // return view('admin.dashboard.home');
                        }
                        public function update (){
                            // return view('admin.dashboard.home');
                            }
                            public function softdelete (){
                                // return view('admin.dashboard.home');
                                }
                                public function restore (){
                                    // return view('admin.dashboard.home');
                                    }
                                    public function delete (){
                                        // return view('admin.dashboard.home');
                                        }
}
