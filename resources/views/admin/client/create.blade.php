@extends('base_layout.master_layout')

@section('content')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-blue-hoki"></i>
            <span class="caption-subject font-blue-hoki bold uppercase">Add Client</span>
            {{-- <span class="caption-helper">Add Provider</span> --}}
        </div>

    </div>
    <div class="portlet-body form" style="display: block;">
        @php
        $route = {{ route('admin.provider.store') }}
     @endphp
     @include('admin.client.fileds',['action'=>"$route"])
        {{-- <x-admin.form.form-add-update-provider  id="form-add-provider" action="{{ route('admin.provider.store') }}" /> --}}
    </div>
</div>
@endsection