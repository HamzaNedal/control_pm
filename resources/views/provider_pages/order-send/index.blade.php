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
                        <i class="fa fa-globe"></i>Sent Orders
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

                    @include('provider_pages.order-send.table')
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    {{-- <x-modal title="Add Provider" id="addProvider" classProvider='add-provider'>
        <x-slot name='inputs'>
            <x-admin.form.form-add-update-provider  id="form-add-provider" action="{{ route('admin.provider.store') }}" />
        </x-slot>
    </x-modal>
    <x-modal title="Update Provider" id="updateProvider" classProvider='update-provider'>
        <x-slot name='inputs'>
            <x-admin.form.form-add-update-provider updateForm='updateForm' id="form-update-provider" action="{{ route('admin.provider.update',['id'=>0]) }}" />
        </x-slot>
    </x-modal> --}}
    @push('js')
        <script>
            // $(document).on('click','.add-provider',function(){
            //    $('#form-add-provider').submit();
            // });
            // $(document).on('click','.update-provider',function(){
            //     var id = $(this).data('id');
            //     $('#form-update-provider').children('.user_id').val(id);
            //     var url = "/"+id;
            //     $('#form-update-provider').attr('action',url);
            //    $.ajax({
            //        type: "get",
            //        url: `${url}`,
            //        data: "get",
            //        dataType: "json",
            //        success: function (response) {
            //         $('#form-update-provider').children('#name').val(id);
            //        }
            //    });
            // });
        $(function() {
          var table = $('#prvider-table').DataTable({
              processing: true,
              serverSide: true,
              'order':[0,'desc'],

              ajax: '{!! route('order.send.datatable') !!}',
              columns: [
                  { data: 'id' },
                 { data: 'deadline' },
                  { data: 'added_date' },
                  { data: 'status'  },

                  { data: 'details'  },

              ]
          });
          $(document).on('click','.accrr',function(){
          var url = "{{ route('provider.accept') }}/";
          var id = $(this).data('id');
          url = url+id

          var url2 = "{{ route('provider.reject') }}/";
          var id2 = $(this).data('id');
          url2 = url2+id2


                Swal.fire({
        title: 'Do you agree to implement the order?',
        showDenyButton: true,
        showCancelButton: true,
        icon: 'question',

        confirmButtonText: `Yes, I accept`,
        denyButtonText: `No`,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {

            $.ajax({
                            type: "get",
                            url: `${url}`,
                            data:{  },
                            dataType: "html"})
                            .done(function() {
                            table.ajax.reload();
                            });

            Swal.fire('Successfully approved', 'moved the order too on the progress  page', 'success')
        } else if (result.isDenied) {

            $.ajax({
                            type: "get",
                            url: `${url2}`,
                            data:{  },
                            dataType: "html"})
                            .done(function() {
                            table.ajax.reload();
                            });

            Swal.fire('Successfully rejected', 'moved the order too on the  reject  page', 'error')
        }
        })

//          swal({
//             title: id ,
//              text: "",
//            type: "warning",
//              showCancelButton: true,

//             confirmButtonClass: "btn-success",
//             denyButtonClass: "btn-warning",

//              confirmButtonText: "Yes,I Accept",
//              denyButtonText: "No, I reject",
//             showCancelButton: true,
//             showDenyButton: true,

//    closeOnConfirm: true,
//    closeOnCancel: false
//      },
//          function(willConfirm){

//            if(willConfirm){
//             $.ajax({
//                     type: "get",
//                     url: `${url}`,
//                    data:{

//                    },
//                     dataType: "html"})
//                    .done(function() {
//                      table.ajax.reload();
//                     });

//              swal("Deleted!", "Your imaginary file has been deleted.", "success");
//              }else{
//                 swal("Cancelled", "Your imaginary file is safe :)", "error");


//             }

//       })
       });

      });

        </script>



    @endpush
@endsection
