<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\IncomeCategory;
use carbon\carbon;
use Session;
use Auth;
use DB;

class Incomecaregorycontroller extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    // public function index (){
    //     $allData= DB::table('income_categories')->where('incate_status',1)->orderBy('incate_id','DESC')->get();
    
    //     return view('admin.income.category.all',compact('allData'));
    //            }
    public function index()
{
    $allData = DB::table('income_categories')
        ->join('users', 'income_categories.incate_creator', '=', 'users.id')
        ->where('income_categories.incate_status', 1)
        ->orderBy('income_categories.incate_id', 'DESC')
        ->select('income_categories.*', 'users.name as creator_name')
        ->get();

    return view('admin.income.category.all', compact('allData'));
}

        
               public function add (){
                return view('admin.income.category.add');
               }
               public function edit($slug){
                $data=IncomeCategory::where('incate_status',1)->where('incate_slug',$slug)->firstorFail();
                    return view('admin.income.category.edit',compact('data'));
                
                }
                public function view ($slug){
                    $data=IncomeCategory::where('incate_status',1)->where('incate_slug',$slug)->firstorFail();
                     return view('admin.income.category.view',compact('data'));
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
                        public function update (Request $request){
                            $id=$request['id'];
                            $this->validate($request,[
                                'name'=>'required|max:50|unique:income_categories,incate_name,'.$id.',incate_id',
                                ],[
                                  'name.required'=>'Please Enter Income Category Name'
                                ]);
                                $slug = Str::slug($request['name'], '-');
                               // $slug='IC'.uniqid(20);
                                 $creator=Auth::user()->id;
                                 $update=IncomeCategory::where('incate_status',1)->where('incate_id',$id)->update([
                                    
                                     'incate_name'=>$request['name'],
                                     'incate_remark'=>$request['remarks'],
                                     'incate_editor'=>$creator,
                                     'incate_slug'=>$slug,
                                     'updated_at'=>carbon::now()->toDateTimeString(),
        
                                ]);
                                if($update){
                                    Session::flash('success','Succesfully Add IncomeCayegory information');
                                      return redirect('dashboard/Income/caregory/view/'.$slug);
                                }else{
                                    Session::flash('Error','Opps! Operation failed');
                                    return redirect('dashboard/Income/caregory/edit/'.$slug);
                                }
        
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
