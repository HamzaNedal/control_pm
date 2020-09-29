<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{
    public function index()
    {
        $active ='invoice';   
        $activeSub ='invoice.index';
        return view('admin.invoice.index',compact('active','activeSub'));
    }

    public function create()
    {
        $active ='invoice';
        $activeSub ='invoice.index';
        $providers = User::where('role','provider')->get();
        $clients = User::where('role','client')->get();
        return view('admin.invoice.create',compact('active','activeSub','providers','clients'));
    }

    public function store(CreateInvoiceRequest $request,ImageService $imageService)
    {
        
        $input = $request->except(['_token', '_method']);
        if ($request->hasfile('file')) {
            $input['file'] = $imageService->upload($input['file'], 'files');
        }
        $user = Invoice::create($input);
        if ($user) {
            return redirect()->route('admin.invoice.index')->with('success','Service invoice added successfully');
        }
        return redirect()->back();
    }

    public  function edit($id)
    {   
        
        $active ='invoice';
        $activeSub ='invoice.index';
        $providers = User::where('role','provider')->get();
        $invoice = Invoice::findOrFail($id);
        return view('admin.invoice.edit',compact('invoice','providers','active','activeSub'));
    }

    public function update(UpdateInvoiceRequest $request, $id,ImageService $imageService)
    {

        $input = $request->except(['_token', '_method']);
        if ($request->hasfile('file')) {
            $input['file'] = $imageService->upload($input['file'], 'files');
        }
        $invoice = Invoice::where('id', $id)->update($input);
        if ($invoice) {
            return redirect()->route('admin.invoice.index')->with('success','Service invoice added updated');
        }
        return redirect()->back();
    }



    public  function destroy($id){

         try {
            Invoice::findOrFail($id)->delete();
            return 'success';
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'not found');
        }

    }

    protected function datatable(){
        $users = Invoice::get();
        $route ='invoice';
        return DataTables::of($users)->addColumn('actions', function ($data) use($route) {
            return view('admin.datatables.actions',compact('data','route'));
        })->addColumn('provider_id', function ($data) {
            return $data->getProvider->name;
        })->addColumn('role', function ($data) {
            return $data->getProvider->role;
        })
        ->addColumn('file', function ($data) {
            return '<a target="_blank" href="'.asset('files/'.$data->file).'">Download</a>';
        })->rawColumns(['actions','file','role'])
        ->make(true);
     }


}
