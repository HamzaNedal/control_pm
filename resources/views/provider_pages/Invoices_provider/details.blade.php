@extends('base_layout.master_layout')

@section('title','Edit invoice')
@section('content')

<div class="portlet light bordered col-md-8">

    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-blue-hoki"></i>
            <span class="caption-subject font-blue-hoki bold uppercase"> details invoice</span>
            {{-- <span class="caption-helper">Add Provider</span> --}}
        </div>

    </div>
    <div class="portlet-body form" style="display: block;">
        @include('provider_pages.Invoices_provider.fileds')
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
