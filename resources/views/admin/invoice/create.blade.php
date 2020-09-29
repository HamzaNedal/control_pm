@extends('base_layout.master_layout')

@section('title','Add invoice')
@section('content')

<div class="portlet light bordered">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-blue-hoki"></i>
            <span class="caption-subject font-blue-hoki bold uppercase">Add invoice</span>
            {{-- <span class="caption-helper">Add Provider</span> --}}
        </div>

    </div>
    <div class="portlet-body form" style="display: block;">

     @include('admin.invoice.fileds',['action'=>route('admin.invoice.store')])
    </div>
</div>
@push('js')
    <script src="{{ asset('metronic') }}/assets/admin/pages/scripts/form-samples.js"></script>
    <script>
        jQuery(document).ready(function() {    

           FormSamples.init();
        });
        $('#client_id').on('click',function(){
          console.log('test');
      })
    </script>
@endpush
@endsection