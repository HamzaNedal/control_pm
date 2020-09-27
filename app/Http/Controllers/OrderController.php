<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.order.index');
    }
    protected function datatable()
    {
        $users = Order::get();
        $route = 'order';
        return DataTables::of($users)->addColumn('actions', function ($data) use ($route) {
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
        $providers = User::where('role', 'provider')->get();
        $clients = User::where('role', 'client')->get();
        return view('admin.order.create', compact('providers', 'clients'));
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
        $order = Order::findOrFail($id);
        $providers = User::where('role', 'provider')->get();
        $clients = User::where('role', 'client')->get();
        return view('admin.order.edit', compact('order', 'providers', 'clients'));
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
        return view('admin.order_create.index');
    }
    protected function datatableOrderCreateButNotSend($id = 0)
    {
        $orders = Order::where(['status' => $id])->get();
        return DataTables::of($orders)->addColumn('actions', function ($data) {
            return "<a  href='" . route('admin.order.send.to.index', ['id' => $data->id]) . "' class='btn btn-success btn-xs' alt='send' title='send'><i class='fa fa-check'></i></a>";
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
       return view('admin.order_send_to_provider.index');
    }
    protected function datatableSendOrderToProvider($id=1)
    {
        $orders = Order::where(['status' => $id])->get();
        return DataTables::of($orders)->addColumn('client_id', function ($data) {
            return $data->getClient->name;
        })->addColumn('provider_id', function ($data) {
            return $data->getProvider->name;
        })
            ->make(true);
    }

    public function acceptOrderByProvider($id)
    {
        $order = Order::where(['order_id' => $id, 'provider_id' => auth()->user()->id])->first();
        $order->status = 2;
        $order->save();
    }

    public function acceptOrderByProviderView()
    {
       return view('admin.order_accept_by_provider.index');
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
       return view('admin.order_reject_by_provider.index');
    }

    protected function datatableRejectOrderByProvider()
    {
        return  $this->datatableSendOrderToProvider(3);
    }


    public function complateOrderByProvider($id)
    {
        $order = Order::where(['order_id' => $id, 'provider_id' => auth()->user()->id])->first();
        $order->status = 4;
        $order->save();
    }
    protected function datatableComplateOrderByProvider()
    {
        // $this->datatableOrderCreateButNotSend(4);
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
