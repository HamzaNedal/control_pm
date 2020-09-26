<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProviderController extends Controller
{
    public function index(){
        return view('admin.provider.index');
    }

    public function create(){
        return view('admin.provider.create');
    }

    public function store(Request $request){

       $input = $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'payment_method' => 'required|string',
            'education_level' => 'required|string',
            'name_university' => 'required|string',
            'years_experience' => 'required|numeric',
            'subjects' => 'required',
            'country' => 'required|string',
            'whats_up' => 'required',
            'capacity_day'=>'required|numeric',
        ]);
        $input['role'] = 'provider';
        $user = User::create($input);
        if($user){
            return redirect()->back()->with('msg','Service provider added successfully');
        }
    }


        public function update(Request $request,$id){

            $request->validate([
                'name' => 'required|unique:users,name,id',
                'password' => 'required',
                'payment_method' => 'required|string',
                'education_level' => 'required|string',
                'name_university' => 'required|string',
                'years_experience' => 'required|numeric',
                'subjects' => 'required',
                'country' => 'required|string',
                'whats_up' => 'required',
                'capacity_day'=>'required|numeric',
            ]);


            $user=User::where('id',$id)->update([

                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'role'=>'provider',
                'payment_method'=>$request->payment_method,
                'education_level'=>$request->education_level,
                'name_university'=>$request->name_university,
                'years_experience'=>$request->years_experience,
                'subjects'=>$request->subjects,
                'country'=>$request->country,
                'whats_up'=>$request->Whats_up,
                'capacity_day'=>$request->capacity_day,

            ]);


            if($user){

                return redirect()->back()->with('msg',' success update ');
            }

    }

    public  function edit($id)
    {   $user = User::findOrFail($id);
        return view('admin.provider.edit',compact('user'));
    }

    protected function datatable(){
        $users = User::where(['role'=>'provider'])->get();
        $route ='provider';
        return DataTables::of($users)->addColumn('actions', function ($data) use($route) {
            return view('admin.datatables.actions',compact('data','route'));
        })->rawColumns(['actions'])
        ->make(true);
     }

    //  public function getProviders($id)
    //  {
    //     $user = User::findOrFail($id);
    //     return json_encode($user);
    //  }
}
