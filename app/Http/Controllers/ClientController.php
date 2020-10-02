<?php

namespace App\Http\Controllers;

use App\Http\Requests\createClientRequest;
use App\Http\Requests\updateClientRequest;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ClientController extends Controller
{
    public function index()
    {
        $active ='user';   
        $activeSub ='client.index';
        return view('admin.client.index',compact('active','activeSub'));
    }
    public  function create()
    {
        return view('admin.client.create');
    }
    public function store(createClientRequest $request)
    {
        $input = $request->except(['_token', '_method']);

        $input['role'] = 'client';

        $user = User::create($input);


        if ($user) {
            return redirect()->route('admin.client.index')->with('success', 'Client added successfully');
        }
    }

    public  function edit($id)
    {
        try {
            $active ='user';   
             $activeSub ='client.index';
            $user = User::findOrFail($id);
            return view('admin.client.edit', compact('user','active','activeSub'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.client.index')->with('error', 'not found');
        }
    }
    public function update(updateClientRequest $request, $id)
    {
        $input = $request->except(['_token', '_method']);

        $input['role'] = 'client';
        try {

            $user = User::findOrFail($id)->update($input);
            return redirect()->route('admin.client.index')->with('success', 'The data has been successfully updated');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'not found');
        }
    }

    public  function destroy($id){

        try {

            $user = User::findOrFail($id);
            $user->delete =1;
            $user->save();
           return 'success';
        //    return redirect()->route('admin.client.index')->with('success', 'The client has been successfully deleted');
       } catch (ModelNotFoundException $e) {
           return redirect()->back()->with('error', 'not found');
       }

   }

    protected function datatable()
    {
        $users = User::where(['role' => 'client'])->get();
        $route = 'client';
        return DataTables::of($users)->addColumn('actions', function ($data) use ($route) {
            return view('admin.datatables.actions', compact('data', 'route'));
        })->addColumn('total_amount', function ($data) {
            $amount = Invoice::where('provider_id',$data->id)->get();
            $amount = $amount->sum('down_payment');
            return "<a href='".route('admin.invoice.index',['id'=>1,'search'=>$data->name])."'  title='Show his invoices'>".$amount."</a>";
        })->rawColumns(['actions','total_amount'])
            ->make(true);
    }
}
