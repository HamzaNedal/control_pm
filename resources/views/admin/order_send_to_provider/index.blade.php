@extends('base_layout.master_layout')

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Data Tables</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Managed Datatables</a>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown"
                    data-hover="dropdown" data-delay="1000" data-close-others="true" aria-expanded="false">
                    Actions <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">Action</a>
                    </li>
                    <li>
                        <a href="#">Another action</a>
                    </li>
                    <li>
                        <a href="#">Something else here</a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="#">Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>Managed Table
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                        <a href="#portlet-config" data-toggle="modal" class="config">
                        </a>
                        <a href="javascript:;" class="reload">
                        </a>
                        {{-- <a href="javascript:;" class="remove">
                        </a> --}}
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                             
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i
                                            class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                                Print </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                Save as PDF </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                Export to Excel </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('admin.order_send_to_provider.table')
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
              ajax: '{!! route('admin.order.send.to.provider.datatable') !!}',
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
