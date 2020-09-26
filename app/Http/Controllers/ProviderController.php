<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index(){
        return view('admin.provider.index');
    }

    public function store(){
        dd(request()->all());
    }
}
