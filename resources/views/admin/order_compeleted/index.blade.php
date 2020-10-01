@extends('base_layout.master_layout')

@section('title','Completed ordres')
@section('content')

    <div class="page-bar"></div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>Completed Orders Management
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
                                <div class="btn-group pull-right"></div>
                            </div>
                        </div>
                    </div>
                    @include('admin.order_compeleted.table')
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
              ajax: '{!! route('admin.complete.order.by.provider.datatable') !!}',
              columns: [
                  { data: 'order_number', name: 'id' },
                  { data: 'client_id', name: 'client_id' },
                  { data: 'provider_id', name: 'provider_id' },
                  { data: 'title', name: 'title' },
                  { data: 'status', name: 'status' },
                  { data: 'added_date', name: 'added_date' },
                  { data: 'deadline', name: 'deadline' },
                  { data: 'files_provider', name: 'files_provider' },
                  { data: 'actions' },


              ]
          });
          $(document).on('click','.sendOrder',function(e){
              e.preventDefault();
          var url = "{{ route('admin.edit.order.after.compeleted') }}/";
          var id = $(this).data('id');
          var provider = $(this).data('name');
          var message_id = $(this).data('message');
          var info = $('#'+message_id).val();
          url = url+id
        swal.fire({
            title: "Are you sure?",
            text: `You will sent this order to ${provider} to edit!`,
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-success",
            confirmButtonText: "Yes, Send it!",
            closeOnConfirm: false
        })
        .then((result)=>{

            if(result.isConfirmed){
            $.ajax({
                   type: "get",
                   url: `${url}`,
                    data:{
                        info:info
                    },
                   dataType: "html"})
                   .done(function() {
                        table.ajax.reload();
                   });

                   Swal.fire("Sended!", "Your order has been sent.", "success");
            }

        })
      });
      });

        </script>
    @endpush
@endsection
