@extends('base_layout.master_layout')

@section('content')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-blue-hoki"></i>
            <span class="caption-subject font-blue-hoki bold uppercase">Update Order</span>
            {{-- <span class="caption-helper">Add Provider</span> --}}
        </div>

    </div>
    <div class="portlet-body form" style="display: block;">
        @include('admin.order.fileds',['action'=>route('admin.order.update',['id'=>$user->id]),'updateForm'=>'updateForm'])
    </div>
</div>
@endsection