<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\IncomeCategory;
use carbon\carbon;
use Session;
use Auth;

class Incomecaregorycontroller extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index (){
        $allData= IncomeCategory::where('incate_status',1)->orderBy('incate_id','DESC')->get();
        return view('admin.income.category.all',compact('allData'));
               }
        
               public function add (){
                return view('admin.income.category.add');
               }
               public function edit(){
                 return view('admin.income.category.edit');
                }
                public function view (){
                     return view('admin.income.category.view');
                    }
                    public function submit (Request $request){
                        $this->validate($request,[
                        'name'=>'required|max:50|unique:income_categories,incate_name',
                        ],[
                          'name.required'=>'Please Enter Income Category Name'
                        ]);
                        $slug = Str::slug($request['name'], '-');
                       // $slug='IC'.uniqid(20);
                         $creator=Auth::user()->id;
                         $insert=IncomeCategory::insert([
                            
                             'incate_name'=>$request['name'],
                             'incate_remark'=>$request['remarks'],
                             'incate_creator'=>$creator,
                             'incate_slug'=>$slug,
                             'created_at'=>carbon::now()->toDateTimeString(),

                        ]);
                        if($insert){
                            Session::flash('success','Succesfully Add IncomeCayegory information');
                              return redirect('dashboard/Income/caregory/add');
                        }else{
                            Session::flash('Error','Opps! Operation failed');
                            return redirect('dashboard/Income/caregory/add');
                        }
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
