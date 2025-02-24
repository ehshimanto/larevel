<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Income;
use carbon\carbon;
use Session;
use Auth;
use DB;

class IncomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index (){
       // $allData= DB::table('incomes')->where('income_status',1)->orderBy('income_id','DESC')->get();
    //    $allData = DB::table('incomes')
    //     ->join('users', 'incomes.income_creator', '=', 'users.id')
    //     ->where('incomes.income_status', 1)
    //     ->orderBy('incomes.income_id', 'DESC')
    //     ->with('categoryInfo')
    //     ->select('incomes.*', 'users.name as creator_name')
    //     ->get();


    $allData = DB::table('incomes')
    ->join('users', 'incomes.income_creator', '=', 'users.id')
    ->leftJoin('income_categories', 'incomes.income_category', '=', 'income_categories.incate_id') // Assuming 'income_categories' is the category table
    ->where('incomes.income_status', 1)
    ->orderBy('incomes.income_id', 'DESC')
    ->select(
        'incomes.*', 
        'users.name as creator_name', 
        'income_categories.incate_name'
    )
    ->get();


    
        return view('admin.income.main.all',compact('allData'));
    
    }
        
               public function add (){
               return view('admin.income.main.add');
               }
               public function edit($slug){
                $data=Income::where('income_status',1)->where('income_slug',$slug)->firstorFail();
                return view('admin.income.main.edit',compact('data'));
                }
                public function view ($slug){
                    $data=Income::where('income_status',1)->where('income_slug',$slug)->firstorFail();
                     return view('admin.income.main.view',compact('data'));
                    }
                    public function insert (){
                        // return view('admin.dashboard.home');
                        }
                        public function submit (Request $request){
                            $this->validate($request,[
                            'title'=>'required|max:50|unique:incomes,income_title',
                            ],[
                              'title.required'=>'Please Enter Income Name'
                            ]);
                            $slug = Str::slug($request['title'], '-');
                           // $slug='IC'.uniqid(20);
                             $creator=Auth::user()->id;
                             $insert=Income::insert([
                                
                                 'income_title'=>$request['title'],
                                 'income_category'=>$request['category'],
                                 'income_amount'=>$request['amount'],
                                 'income_date'=>$request['date'],
                                 'income_creator'=>$creator,
                                 'income_slug'=>$slug,
                                 'created_at'=>carbon::now()->toDateTimeString(),
    
                            ]);
                            if($insert){
                                Session::flash('success','Succesfully Add Income information');
                                  return redirect('dashboard/Income/add');
                            }else{
                                Session::flash('Error','Opps! Operation failed');
                                return redirect('dashboard/Income/add');
                            }
                            }
                        public function update (Request $request){
                            $id=$request['id'];
                            $this->validate($request,[
                                'title'=>'required|max:50|unique:incomes,income_title,'.$id.',income_id',
                                ],[
                                  'title.required'=>'Please Enter Income  Title'
                                ]);
                                $slug = Str::slug($request['title'], '-');
                               // $slug='IC'.uniqid(20);
                                 $editor=Auth::user()->id;
                                 $update=Income::where('income_status',1)->where('income_id',$id)->update([
                                    
                                 'income_title'=>$request['title'],
                                 'income_category'=>$request['category'],
                                 'income_amount'=>$request['amount'],
                                 'income_date'=>$request['date'],
                                 'income_editor'=>$editor,
                                 'income_slug'=>$slug,
                                'updated_at'=>carbon::now()->toDateTimeString(),
        
                                ]);
                                if($update){
                                    Session::flash('success','Succesfully Update Income information');  
                                      return redirect('dashboard/Income/view/'.$slug);
                                }else{
                                    Session::flash('Error','Opps! Operation failed');
                                    return redirect('dashboard/Income/edit/'.$slug);
                                }
                            }
                            public function softdelete (){
                                $id=$_POST['modal_id'];
                                $soft=Income::where('income_status',1)->where('income_id',$id)->update([
                                    'income_status'=>0,
                                    'created_at'=>carbon::now()->toDateTimeString(),

                                ]);
                                if($soft){
                                    Session::flash('success','Succesfully Delet Income information');
                                      return redirect('dashboard/Income/');
                                }else{
                                    Session::flash('Error','Opps! Operation failed');
                                    return redirect('dashboard/Income/');
                                }
                                }
                                public function restore (){
                                    $id=$_POST['modal_id'];
                                    $soft=Income::where('income_status',0)->where('income_id',$id)->update([
                                        'income_status'=>1,
                                        'created_at'=>carbon::now()->toDateTimeString(),
    
                                    ]);
                                    if($soft){
                                        Session::flash('success','Succesfully Restore Income information');
                                          return redirect('dashboard/recycle/income/');
                                    }else{
                                        Session::flash('Error','Opps! Operation failed');
                                        return redirect('dashboard/recycle/income/');
                                    }
                                    }
                                    public function delete (){
                                        $id=$_POST['modal_id'];
                                    $soft=Income::where('income_status',0)->where('income_id',$id)->update([
                                        'income_status'=>1,
                                        'created_at'=>carbon::now()->toDateTimeString(),
    
                                    ]);
                                    if($soft){
                                        Session::flash('success','Succesfully Restore Income information');
                                          return redirect('dashboard/recycle/income/');
                                    }else{
                                        Session::flash('Error','Opps! Operation failed');
                                        return redirect('dashboard/recycle/income/');
                                    }
                                        }
}
