@extends('base_layout.master_layout')

@section('title','Clients')
@section('content')
<div class="page-bar"></div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>Clients Management
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
                                    <a  class="btn green" data-toggle="modal" href="{{ route('admin.client.create') }}">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right"></div>
                            </div>
                        </div>
                    </div>
                    @include('admin.client.table')
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    @push('js')
        <script>
        $(function() {
            $.ajaxSetup({
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             });
        var table =  $('#table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! route('admin.client.datatable') !!}',
              columns: [
                  { data: 'id', name: 'id' },
                  {data: 'actions', name: 'actions', orderable: false, searchable: false}
                  { data: 'name', name: 'name' },
                  { data: 'email', name: 'email' },
                  { data: 'phone', name: 'phone' },
                  { data: 'payment', name: 'payment' },
                  { data: 'words', name: 'words' },
                  { data: 'created_at', name: 'created_at' },
              ]
          });
          $(document).on('click','.remove',function(){
          var url = "{{ route('admin.client.destroy') }}/";
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
                        $('#table').DataTable().clear().draw();
                   });

            swal("Deleted!", "Your imaginary file has been deleted.", "success");
            }

        })
      });

      });


        </script>
    @endpush
@endsection
