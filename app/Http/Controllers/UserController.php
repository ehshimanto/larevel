<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function all (){
        return view('admin.user.all');
       }

       public function add (){
        return view('admin.user.add');
       }
       public function edit(){
        return view('admin.user.edit');
        }
        public function view(){
             return view('admin.user.view');
            }
            public function submit(){
                // return view('admin.dashboard.home');
                }
            public function insert(){
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
