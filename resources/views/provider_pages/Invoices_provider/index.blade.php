@extends('base_layout.master_layout')
@section('title','invoices')

@section('content')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

@endpush
    <div class="page-bar"></div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>Invoices
                    </div>
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">

                                </div>
                            </div>
                        </div>
                    </div>
                    @include('provider_pages.Invoices_provider.table')
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    @push('js')

    <script>

        $(function() {
            table =  $('#table').DataTable({
              'order': [0,'desc'],
              processing: true,
              serverSide: true,
              ajax: '{!! route('provider.invoice.datatable') !!}',
              columns: [
                  { data: 'id', name: 'id' },
                  {data:'date'},
                  {data: 'details', name: 'actions', orderable: false, searchable: false},

              ]
          });

      });

        </script>
    @endpush
@endsection
