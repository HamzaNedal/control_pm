<?php

namespace App\Http\Controllers\provider;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProviderController extends Controller
{


    //page all order
    public function index()
    {
        return view('provider_pages.index');
    }


    public function accept($id = 0)
    {

        Order::where('id', $id)->update([

            'status' => '2'


        ]);
    }

    public function reject($id = 0)
    {

        Order::where('id', $id)->update([

            'status' => '3'


        ]);
    }
    protected function datatable()
    {
        $orders = Order::where('provider_id', 13)->where('status', '>', '0')->get();
        return DataTables::of($orders)->addColumn('status', function ($data) {
            if ($data->status == 'Waiting accept') {
                return " <button data-id= '" . $data->id . "' type='button' href='' class='icon-btn btn green accrr'  alt='send' title='Click to accept or reject' style='height:50px'><i class='fa fa-external-link'></i>     <div style='color:#fff'>    Accept  </div>   </button>";
            } else {

                return $data->status;
            }
        })->addColumn('details', function ($data) {
            return " <button class='icon-btn btn blue' style=' color:#fff ; height:50px'>
            <i class='fa fa-file-o'></i>

            <div style='color:#fff'>
            Details
            </div>
            </button>";
        })->rawColumns(['status', 'details'])
            ->make(true);
    }



    //page send order

    public function page_send()
    {
        return view('provider_pages.order-send.index');
    }



    protected function send_datatable()
    {

        $orders = Order::where('provider_id', 13)->where('status', '=', '1')->get();
        return DataTables::of($orders)->addColumn('status', function ($data) {
            if ($data->status == 'Waiting accept') {
                return " <button data-id= '" . $data->id . "' type='button' href='' class='icon-btn btn green accrr'  alt='send' title='Click to accept or reject' style='height:50px'><i class='fa fa-external-link'></i>     <div style='color:#fff'>    Accept  </div>   </button>";
            } else {

                return $data->status;
            }
        })->addColumn('details', function ($data) {
            return " <button class='icon-btn btn blue' style=' color:#fff ; height:50px'>
                 <i class='fa fa-file-o'></i>

                 <div style='color:#fff'>
                 Details
                 </div>
                 </button>";
        })->rawColumns(['status', 'details'])
            ->make(true);;
    }


    //page on progress



    public function page_onprogress()
    {
        return view('provider_pages.order-onprogress.index');
    }


    protected function onprogress_datatable()
    {


        $orders = Order::where('provider_id', 13)->where('status', '=', '2')->get();
        return DataTables::of($orders)->addColumn('status', function ($data) {

            return  $data->status;
        })->addColumn('details', function ($data) {
            return " <button class='icon-btn btn blue' style=' color:#fff ; height:50px'>
                 <i class='fa fa-file-o'></i>

                 <div style='color:#fff'>
                 Details
                 </div>
                 </button>";
        })->addColumn('Delivery', function ($data) {

            return " <button class='icon-btn btn green' style=' color:#fff ; height:50px'>
            <i class='fa fa-paper-plane-o'></i>

            <div style='color:#fff'>
            Delivery
            </div>
            </button>";
        })->rawColumns(['status', 'details', 'Delivery'])->make(true);;
    }

    public function order_delivery(Request $request, $id, ImageService $imageService)
    {
        $validatedData = $request->validate([
            'files' => 'array|max_uploaded_file_size:5000',
            'files.*' => 'required|file|mimes:jpeg,png,jpg,doc,docx,ppt,pps,pptx,xls,xlsx,pdf',
        ]);


        $input = $request->all();

        if ($request->hasfile('files')) {
            $pathfiles = '';
            foreach ($input['files'] as $value) {
                $pathfiles .= $imageService->upload($value, 'files') . ',';
            }
        }
        $input['files'] = substr($pathfiles, 0, -1);;

        Order::where('id', $id)->update([
            'files_provider' => $input['files'],
            'status' => 4
        ]);
        return redirect()->route('order.onprogress')->with('success', 'The request has been delivered successfully');
    }

    //Completed requests page


    public function page_completed()
    {
        return view('provider_pages.order-completed.index');
    }

    protected function completed_datatable()
    {


        $orders = Order::where('provider_id', 13)->where('status', '=', '4')->get();
        return DataTables::of($orders)->addColumn('status', function ($data) {

            return  $data->status;
        })->rawColumns(['status'])->make(true);;
    }


    //  page modification


    public function page_modification()
    {
        return view('provider_pages.order-modification.index');
    }



    protected function modification_datatable()
    {

        $orders = Order::where('provider_id', 13)->where('status', '=', '5')->get();
        return DataTables::of($orders)->addColumn('status', function ($data) {
            return  $data->status;

        })->addColumn('details', function ($data) {
            return " <button class='icon-btn btn blue' style=' color:#fff ; height:50px'>
                 <i class='fa fa-file-o'></i>

                 <div style='color:#fff'>
                 Details
                 </div>
                 </button>";
        })->addColumn('Delivery', function ($data) {

            return " <button class='icon-btn btn green' style=' color:#fff ; height:50px'>
            <i class='fa fa-paper-plane-o'></i>

            <div style='color:#fff'>
            Delivery
            </div>
            </button>";
        })->rawColumns(['status', 'details', 'Delivery'])->make(true);;
    }
}
