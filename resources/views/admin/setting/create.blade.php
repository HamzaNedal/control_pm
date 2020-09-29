@extends('base_layout.master_layout')

@section('title','Setting')
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
            <span class="caption-subject font-blue-hoki bold uppercase">Edit setting</span>
            {{-- <span class="caption-helper">Add Provider</span> --}}
        </div>

    </div>
    <div class="portlet-body form" style="display: block;">
         @include('admin.setting.fileds',['action'=>route('admin.setting.update')])
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