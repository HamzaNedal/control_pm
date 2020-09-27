@extends('base_layout.master_layout')

@section('content')
    <div class="page-bar">
   
       
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>Invoices Table
                    </div>
                    <div class="tools">
                        {{-- <a href="javascript:;" class="collapse">
                        </a>
                        <a href="#portlet-config" data-toggle="modal" class="config">
                        </a>
                        <a href="javascript:;" class="reload">
                        </a> --}}
                        {{-- <a href="javascript:;" class="remove">
                        </a> --}}
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a  class="btn green" data-toggle="modal" href="{{ route('admin.invoice.create') }}">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
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
                    @include('admin.invoice.table')
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
              ajax: '{!! route('admin.invoice.datatable') !!}',
              columns: [
                  { data: 'id', name: 'id' },
                  {data: 'actions', name: 'actions', orderable: false, searchable: false},
                  { data: 'provider_id' },
                  { data: 'down_payment' },
                  { data: 'payment_method' },
                  { data: 'file' },
                  { data: 'created_at' },
              ]
          });
          $(document).on('click','.remove',function(){
          var url = "{{ route('admin.invoice.destroy') }}/";
          var id = $(this).data('id');
          url = url+id
        swal({
            title: "Are you sure?",
            text: "Your will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(willConfirm){

            if(willConfirm){
            $.ajax({
                   type: "post",
                   url: `${url}`,
                   data:{
                       '_method':"Delete",
                       '_token':$('meta[name="csrf-token"]').attr('content')
                   },
                   dataType: "html"})
                   .done(function() {
                    table.ajax.reload();
                   });

            swal("Deleted!", "Your imaginary file has been deleted.", "success");
            }

        })
      });
      });

        </script>
    @endpush
@endsection
