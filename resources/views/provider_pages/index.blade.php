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
                        <i class="fa fa-globe"></i>Orders
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

                        </div>
                    </div>
                    @include('provider_pages.table')
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
     $(document).ready(function() {

        $(function() {
          var table = $('#prvider-table').DataTable({

              processing: true,
              serverSide: true,
              ajax: '{!! route('provider.datatable') !!}',
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

            Swal.fire('Successfully approved', '', 'success')
        } else if (result.isDenied) {

            $.ajax({
                            type: "get",
                            url: `${url2}`,
                            data:{  },
                            dataType: "html"})
                            .done(function() {
                            table.ajax.reload();
                            });

            Swal.fire('rejected', '', 'error')
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
    });
        </script>



    @endpush
@endsection
