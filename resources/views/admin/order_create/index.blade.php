@extends('base_layout.master_layout')

@section('title','Created orders')
@section('content')

    <div class="page-bar"> </div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>Created Orders Management
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
                    @include('admin.order_create.table')
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
              ajax: '{!! route('admin.send.order.datatable') !!}',
              columns: [
                  { data: 'order_number', name: 'id' },
                  { data: 'client_id', name: 'client_id' },
                  { data: 'provider_id', name: 'provider_id' },
                  { data: 'title', name: 'title' },
                  { data: 'status', name: 'status' },
                  { data: 'added_date', name: 'added_date' },
                  { data: 'deadline', name: 'deadline' },
                  { data: 'number_words', name: 'number_words' },
                  {data: 'actions', name: 'actions', orderable: false, searchable: false}



              ]
          });
          $(document).on('click','.sendOrder',function(e){
              e.preventDefault();
          var url = "{{ route('admin.order.send.to.index') }}/";
          var id = $(this).data('id');
          var provider = $(this).data('name');
          url = url+id
          Swal.fire({
            title: "Are you sure?",
            text: `You will sent this order to ${provider}!`,
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-success",
            confirmButtonText: "Yes, Send it!",
            closeOnConfirm: false
        })
        .then((willConfirm)=>{

            if(willConfirm.isConfirmed){
            $.ajax({
                   type: "get",
                   url: `${url}`,
                   dataType: "html"})
                   .done(function() {
                        table.ajax.reload();
                   });

            swal("Sended!", "Your order has been sent.", "success");
            }

        })
      });

      });

        </script>
    @endpush
@endsection
