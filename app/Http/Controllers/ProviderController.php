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
    public  function create()
    {
        return view('admin.provider.create');
    }
    public function store(){
        dd(request()->all());
    }

    public  function edit($id)
    {   $user = User::findOrFail($id);
        return view('admin.provider.edit',compact('user'));
    }
     public function update($id)
    {
        dd(request()->all());
    }
    protected function datatable(){
        $users = User::get();
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
