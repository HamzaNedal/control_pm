<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=1,$search = '')
    {
        $active = 'order';
        $activeSub = 'order.index';
        return view('admin.order.index', compact('active', 'activeSub','id','search'));
    }
    protected function datatable()
    {
        $orders = Order::get();
        $route = 'order';
        return DataTables::of($orders)->addColumn('actions', function ($data) use ($route) {
            return view('admin.datatables.actions', compact('data', 'route'));
        })->addColumn('client_id', function ($data) use ($route) {
            return $data->getClient->name;
        })->addColumn('provider_id', function ($data) use ($route) {
            return $data->getProvider->name;
        })->rawColumns(['actions'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'order';
        $activeSub = 'order.index';
        $providers = User::where('role', 'provider')->get();
        $clients = User::where('role', 'client')->get();
        return view('admin.order.create', compact('providers', 'active', 'activeSub', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderRequest $request, ImageService $imageService)
    {
        $input = $request->all();

        if ($request->hasfile('files')) {
            $pathfiles = '';
            foreach ($input['files'] as $value) {
                $pathfiles .= $imageService->upload($value, 'files') . ',';
            }
        }
        $input['files'] = substr($pathfiles, 0, -1);;
        $input['status'] = 0;
        Order::Create($input);
        return redirect()->route('admin.order.index')->with('success', 'Service order added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active = 'order';
        $activeSub = 'order.index';
        $order = Order::findOrFail($id);
        $providers = User::where('role', 'provider')->get();
        $clients = User::where('role', 'client')->get();
        return view('admin.order.edit', compact('order', 'active', 'activeSub', 'providers', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, $id, ImageService $imageService)
    {

        Order::findOrfail($id);
        $input = $request->except(['_method', '_token']);
        if ($request->hasfile('files')) {
            $pathfiles = '';
            foreach ($input['files'] as $value) {
                $pathfiles .= $imageService->upload($value, 'files') . ',';
            }
            $input['files'] = substr($pathfiles, 0, -1);;
        }
        Order::where(['id' => $id])->update($input);
        return redirect()->route('admin.order.index')->with('success', 'Service order updated successfully');
    }

    public function orderCreateButNotSend()
    {
        $active = 'order';
        $activeSub = 'order.send.index';
        return view('admin.order_create.index', compact('active', 'activeSub'));
    }
    protected function datatableOrderCreateButNotSend($id = 0)
    {
        $orders = Order::where(['status' => $id])->get();
        return DataTables::of($orders)->addColumn('actions', function ($data) {
            return "<a  href='' data-id='".$data->id."' data-name='".$data->getProvider->name."' class='btn btn-success btn-xs sendOrder' alt='send' title='send'><i class='fa fa-check'></i></a>";
        })->addColumn('client_id', function ($data) {
            return $data->getClient->name;
        })->addColumn('provider_id', function ($data) {
            return $data->getProvider->name;
        })->rawColumns(['actions'])
            ->make(true);
    }
    public function sendOrderToProvider($id)
    {
        $order = Order::findOrfail($id);
        $order->status = 1;
        $order->save();
    }
    public function sendOrderToProviderView()
    {
        $active = 'order';
        $activeSub = 'order.send.to.provider';
        return view('admin.order_send_to_provider.index', compact('active', 'activeSub'));
    }
    protected function datatableSendOrderToProvider($id = 1)
    {
        $orders = Order::where(['status' => $id])->get();
        return DataTables::of($orders)->addColumn('client_id', function ($data) {
            return $data->getClient->name;
        })->addColumn('provider_id', function ($data) {
            return $data->getProvider->name;
        })->make(true);
    }

    public function acceptOrderByProvider($id)
    {
        $order = Order::where(['order_id' => $id, 'provider_id' => auth()->user()->id])->first();
        $order->status = 2;
        $order->save();
    }

    public function acceptOrderByProviderView()
    {
        $active = 'order';
        $activeSub = 'accept.order.by.provider';
        return view('admin.order_accept_by_provider.index', compact('active', 'activeSub'));
    }

    protected function datatableAcceptOrderByProvider()
    {
        return $this->datatableSendOrderToProvider(2);
    }

    public function rejectOrderByProvider($id)
    {
        $order = Order::where(['order_id' => $id, 'provider_id' => auth()->user()->id])->first();
        $order->status = 3;
        $order->save();
    }

    public function rejectOrderByProviderView()
    {
        $active = 'order';
        $activeSub = 'reject.order.by.provider';
        return view('admin.order_reject_by_provider.index', compact('active', 'activeSub'));
    }

    protected function datatableRejectOrderByProvider()
    {
        return  $this->datatableSendOrderToProvider(3);
    }


    public function complateOrderByProvider($id)
    {
        $order = Order::where(['order_id' => $id, 'provider_id' => auth()->user()->id])->first();
        if ($order) {
            $order->status = 4;
            $order->save();
        }
        abort(404);
    }

    public function complateOrderByProviderView()
    {
        $active = 'order';
        $activeSub = 'complate.order.by.provider';
        return view('admin.order_compeleted.index', compact('active', 'activeSub'));
    }
    protected function datatableComplateOrderByProvider()
    {
        $orders = Order::where(['status' => 4])->get();
        return DataTables::of($orders)->addColumn('actions', function ($data) {
            return "<a  data-id='".$data->id."' data-name='".$data->getProvider->name."' class='btn btn-success btn-xs sendOrder' alt='send to edit' title='send to edit'><i class='fa fa-undo'></i></a>";
        })->addColumn('provider_id', function ($data) {
            return $data->getProvider->name;
        })->addColumn('provider_id', function ($data) {
            return $data->getProvider->name;
        })->rawColumns(['actions'])->make(true);
    }


    public function editOrderAfterCompeleted($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 5;
        $order->save();
    }
    public function editOrderAfterCompeletedView()
    {
        $active = 'order';
        $activeSub = 'edit.order.after.compeleted';
        return view('admin.edit_order_after_compeleted.index', compact('active', 'activeSub'));
    }
    public function datatbaleEditOrderAfterCompeleted()
    {
        return  $this->datatableSendOrderToProvider(5);
    }

    public function closeOrderView()
    {
        $active = 'order';
        $activeSub = 'close.order';
        return view('admin.close_order.index', compact('active', 'activeSub'));
    }

    public function datatbaleCloseOrder()
    {
        $orders = Order::where('delivery_date','<',date('yy-m-d'))->get();
        return DataTables::of($orders)->addColumn('client_id', function ($data) {
            return $data->getClient->name;
        })->addColumn('provider_id', function ($data) {
            return $data->getProvider->name;
        })->make(true);
    }

    public function exportExcel($provider)
    {
      $user = User::where('name',$provider)->first();
      if($user){
          $orders  = Order::select('id','provider_id','client_id','title','status','added_date','deadline','information','number_words')->where('provider_id',$user->id)->get();
          return  Excel::download(new OrdersExport($orders), time().'_orders.xlsx');
      }
      return null;
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            Order::findOrFail($id)->delete();
            return 'success';
            // return redirect()->route('admin.provider.index')->with('success', 'The service provider has been successfully deleted');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'not found');
        }
    }
}
