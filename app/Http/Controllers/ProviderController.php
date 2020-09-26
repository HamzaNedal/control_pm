<?php

namespace App\Http\Controllers;

use App\Http\Requests\createProviderRequest;
use App\Http\Requests\updateProviderRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        return view('admin.provider.index');
    }

    public function create()
    {
        return view('admin.provider.create');
    }

    public function store(createProviderRequest $request)
    {

        $input = $request->except(['_token', '_method']);

        $input['role'] = 'provider';

        $user = User::create($input);


        if ($user) {

            return redirect()->route('admin.provider.index')->with('success','Service provider added successfully');
        }
    }

    public function edit($id)
    {



        $users = User::where('id', $id)->get();
        return view('admin.provider.edit', compact('users'));
    }

    public function update(updateProviderRequest $request, $id)
    {

        $input = $request->except(['_token', '_method']);


        $input['role'] = 'provider';
        $user = User::where('id', $id)->update($input);


        if ($user) {

            return redirect()->route('admin.provider.index')->with('success', '');
        }
    }
}
