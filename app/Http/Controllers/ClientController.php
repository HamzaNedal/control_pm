<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ClientController extends Controller
{
    public function index(){
        return view('admin.client.index');
    }
    public  function create()
    {
        return view('admin.client.create');
    }
    public function store(){
        dd(request()->all());
    }

    public  function edit($id)
    {   $user = User::findOrFail($id);
        return view('admin.client.edit',compact('user'));
    }
     public function update($id)
    {
        dd(request()->all());
    }
    protected function datatable(){
        $users = User::get();
        $route ='client';
        return DataTables::of($users)->addColumn('actions', function ($data) use($route) {
            return view('admin.datatables.actions',compact('data','route'));
        })->rawColumns(['actions'])
        ->make(true);
     }
}
