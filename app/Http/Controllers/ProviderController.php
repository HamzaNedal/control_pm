<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index(){
        return view('admin.provider.index');
    }

    public function create(){
        return view('admin.provider.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:users,name',
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


        $user=User::create([

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

            return redirect()->back()->with('msg','Service provider added successfully');
        }

    }

    public function edit($id){

        $users=User::where('id',$id)->get();
    return view('admin.provider.edit',compact('users'));

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
}
