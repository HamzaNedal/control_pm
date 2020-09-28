@extends('base_layout.master_layout')

@section('title','Accepted orders')
@section('content')

    <div class="page-bar"></div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>Accepted Orders Management
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
                             
                            </div>
                        </div>
                    </div>
                    @include('admin.order_accept_by_provider.table')
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    @push('js')
        <script>

        $(function() {
            table =  $('#table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! route('admin.accept.order.by.provider.datatable') !!}',
              columns: [
                  { data: 'id', name: 'id' },
                  { data: 'client_id', name: 'client_id' },
                  { data: 'provider_id', name: 'provider_id' },
                  { data: 'title', name: 'title' },
                  { data: 'status', name: 'status' },
                  { data: 'added_date', name: 'added_date' },
                  { data: 'deadline', name: 'deadline' },
                  { data: 'number_words', name: 'number_words' },
                  

              ]
          });
 
      });

        </script>
    @endpush
@endsection
