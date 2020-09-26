<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('base_layout.master_layout');
});
Route::group(['prefix' => 'admin'], function () {

Route::get('/providers',[ProviderController::class,'index'])->name('admin.provider.index');
// Route::get('/getProviders/{id?}',[ProviderController::class,'getProviders'])->name('admin.provider.getproviders');
Route::get('/provider/datatable',[ProviderController::class,'datatable'])->name('admin.provider.datatable');
Route::get('/provider/create',[ProviderController::class,'create'])->name('admin.provider.create');
Route::post('/provider',[ProviderController::class,'store'])->name('admin.provider.store');
Route::get('/provider/edit/{id}',[ProviderController::class,'edit'])->name('admin.provider.edit');
Route::put('/provider/{id}',[ProviderController::class,'update'])->name('admin.provider.update');
Route::delete('/provider/{id}',[ProviderController::class,'destroy'])->name('admin.provider.destroy');


Route::get('/clients',[ClientController::class,'index'])->name('admin.client.index');
Route::get('/client/datatable',[ClientController::class,'datatable'])->name('admin.client.datatable');
Route::get('/client/create',[ClientController::class,'create'])->name('admin.client.create');
Route::post('/client',[ClientController::class,'store'])->name('admin.client.store');
Route::get('/client/edit/{id}',[ClientController::class,'edit'])->name('admin.client.edit');
Route::put('/client/{id}',[ClientController::class,'update'])->name('admin.client.update');
Route::delete('/client/{id?}',[ClientController::class,'destroy'])->name('admin.client.destroy');

Route::get('/orders',[OrderController::class,'index'])->name('admin.order.index');
Route::get('/order/datatable',[OrderController::class,'datatable'])->name('admin.order.datatable');
Route::get('/order/create',[OrderController::class,'create'])->name('admin.order.create');
Route::post('/order',[OrderController::class,'store'])->name('admin.order.store');
Route::get('/order/edit/{id}',[OrderController::class,'edit'])->name('admin.order.edit');
Route::put('/order/{id}',[OrderController::class,'update'])->name('admin.order.update');
Route::delete('/order/{id}',[OrderController::class,'destroy'])->name('admin.order.destroy');

//order not send
Route::get('send/orders',[OrderController::class,'orderCreateButNotSend'])->name('admin.order.send.index');
Route::get('send/order/sendOrderToProvider/{id}',[OrderController::class,'sendOrderToProvider'])->name('admin.order.send.to.index');
Route::get('send/order/datatable',[OrderController::class,'datatableOrderCreateButNotSend'])->name('admin.send.order.datatable');
//sendOrderToProvider
Route::get('send-to-provider/orders',[OrderController::class,'sendOrderToProviderView'])->name('admin.order.send.to.provider.index');
Route::get('send-to-provider/order/datatable',[OrderController::class,'datatableSendOrderToProvider'])->name('admin.order.send.to.provider.datatable');
//acceptOrderByProviderView
Route::get('acceptOrderByProvider/orders',[OrderController::class,'acceptOrderByProviderView'])->name('admin.accept.order.by.provider.index');
Route::get('acceptOrderByProvider/order/datatable',[OrderController::class,'datatableAcceptOrderByProvider'])->name('admin.accept.order.by.provider.datatable');
//rejectOrderByProviderView
Route::get('rejectOrderByProvider/orders',[OrderController::class,'rejectOrderByProviderView'])->name('admin.reject.order.by.provider.index');
Route::get('rejectOrderByProvider/order/datatable',[OrderController::class,'datatableRejectOrderByProvider'])->name('admin.reject.order.by.provider.datatable');

});
