@extends('base_layout.master_layout')

@section('title','Orders')
@section('content')

    <div class="page-bar"></div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>Orders Management
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
                                    <a  class="btn green" data-toggle="modal" href="{{ route('admin.order.create') }}">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">
                                    @if ($search)
                                    <a class="btn btn-success" href="{{ route('admin.order.exportExcel',['provider'=>"$search"]) }}">Excel <i
                                        class="fa fa-file-excel-o"></i>
                                    </a>
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                    @include('admin.order.table')
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
              ajax: '{!! route('admin.order.datatable') !!}',
              columns: [
                  { data: 'order_number', name: 'id' },

                  { data: 'client_id', name: 'client_id' },
                  { data: 'provider_id', name: 'provider_id' },
                  { data: 'title', name: 'title' },
                  { data: 'status', name: 'status' },
                  { data: 'added_date', name: 'added_date' },
                  { data: 'deadline', name: 'deadline' },
                  { data: 'number_words', name: 'number_words' },
                  { data: 'actions',  orderable: false, searchable: false}


              ]
          });
          @if($search !=='')
             table.columns(`{{ $id }}`).search(`^{{ $search }}$`, true, false).draw();
          @endif


          $(document).on('click','.remove',function(){
          var url = "{{ route('admin.order.destroy') }}/";
          var id = $(this).data('id');
          url = url+id
          Swal.fire({
            title: "Are you sure?",
            text: "Your will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        })
        .then((willConfirm)=>{

            if(willConfirm.isConfirmed){
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

            Swal.fire("Deleted!", "Your imaginary file has been deleted.", "success");
            }

        })
      });
      });

        </script>
    @endpush
@endsection
