@extends('base_layout.master_layout')

@section('content')

<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-blue-hoki"></i>
            <span class="caption-subject font-blue-hoki bold uppercase">Add Order</span>
            {{-- <span class="caption-helper">Add Provider</span> --}}
        </div>

    </div>
    <div class="portlet-body form" style="display: block;">
    @php
        $route = route('admin.order.create')
     @endphp
     @include('admin.order.fileds',['action'=>"$route",'updateForm'=>'updateForm'])
    </div>
</div>
@push('js')
    <script src="{{ asset('metronic') }}/assets/admin/pages/scripts/form-samples.js"></script>
    <script>
        jQuery(document).ready(function() {    

           FormSamples.init();
        });
    </script>
@endpush
@endsection