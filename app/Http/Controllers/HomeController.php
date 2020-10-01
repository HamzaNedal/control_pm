<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       if(auth()->user()->can('admin')){
            return redirect()->route('admin.order.index');
       }

       return redirect()->route('provider.order.index');

    }
    public function setting(){
        $active ='setting';
        $activeSub ='setting.admin';
        return view('admin.setting.create',compact('active','activeSub'));
    }
    public function update(){
        $this->validate(request(),[
            'email' => 'required|email|unique:users,email,'.auth()->user()->id,
        ]);
        auth()->user()->email = request('email');
        if(request('password') !== null){
            auth()->user()->password = Hash::make(request('password'));
        }
        auth()->user()->save();
        return redirect()->back()->with('success', 'The profile  has been successfully updated');
    }

    public function googleMailSettingView(){  
        $active ='setting';
        $activeSub ='setting.googleMail';
        return view('admin.setting.google_mail.create',compact('active','activeSub'));
    }

    public function googleMail(){
      $input =  $this->validate(request(),[
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        // dd($input);
        Setting::where('key','googleMail')->update($input);
        return redirect()->back()->with('success', 'The google mail setting  has been successfully updated');
    }
}
