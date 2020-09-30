<?php

namespace App\Http\Controllers;

use App\Http\Requests\createProviderRequest;
use App\Http\Requests\updateProviderRequest;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class ProviderController extends Controller
{
    public function index()
    {
        $active ='user';
        $activeSub ='provider.index';
        return view('admin.provider.index',compact('active','activeSub'));
    }

    public function create()
    {
        $active ='user';
        $activeSub ='provider.index';
        return view('admin.provider.create',compact('active','activeSub'));
    }

    public function store(createProviderRequest $request)
    {

        $input=$request->all();
        $input = $request->except(['_token', '_method']);


        $input['role'] = 'provider';
        $input['password']=Hash::make($input['password']);


        $user = User::create($input);


        if ($user) {
            return redirect()->route('admin.provider.index')->with('success','Service provider added successfully');
        }
    }

    public function update(updateProviderRequest $request, $id)
    {
        $input=$request->all();


        $input = $request->except(['_token', '_method']);


        $input['role'] = 'provider';

        if($input['password'] === null) {
            unset($input['password']);
        }else{
           $input['password'] = Hash::make($input['password']); 
        }

        $input['role'] = 'provider';
        $user = User::where('id', $id)->update($input);


        if ($user) {

            return redirect()->route('admin.provider.index')->with('success', '');
        }
    }

    public  function edit($id)
    {

        $active ='user';
        $activeSub ='provider.index';

        $user = User::findOrFail($id);
        return view('admin.provider.edit',compact('user','active','activeSub'));
    }

    public  function destroy($id){

         try {

            $user = User::findOrFail($id);
            $user->update(['delete'=>1]);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'not found');
        }

    }

    protected function datatable(){
        $users = User::where(['role'=>'provider','delete'=>0])->get();
        $route ='provider';
        return DataTables::of($users)->addColumn('actions', function ($data) use($route) {
            return view('admin.datatables.actions',compact('data','route'));
        })->addColumn('total_amount', function ($data) {
            $amount = Invoice::where('provider_id',$data->id)->get();
            $amount = $amount->sum('down_payment');
            return "<a href='".route('admin.invoice.index',['id'=>2,'search'=>$data->name])."'  title='Show his invoices'>".$amount."</a>";
        })->rawColumns(['actions','total_amount'])
        ->make(true);
     }

    //  public function getProviders($id)
    //  {
    //     $user = User::findOrFail($id);
    //     return json_encode($user);
    //  }
}
