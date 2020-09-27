<?php

namespace App\Http\Controllers\provider;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProviderController extends Controller
{
    public function index()
    {
        return view('provider_pages.index');
    }


    protected function datatable(){
        $orders = Order::where('provider_id',13)->get();
        $route ='provider';
        return DataTables::of($orders)->addColumn('status', function ($data)  {
            if($data->status==2){
            return "<a  href='' class='btn btn-success btn-xs' alt='send' title='send'><i class='fa fa-check'></i></a>";
            }else {

                return "<a  href='' class='btn ' alt='send' title='send'><i class='fa fa-check'></i></a>";


            }
        })->rawColumns(['status'])
        ->make(true);
     }



}
