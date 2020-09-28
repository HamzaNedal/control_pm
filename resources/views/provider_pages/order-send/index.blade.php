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
                                <div class="btn-group">
                                    <a  class="btn green" data-toggle="modal" href="{{ route('admin.provider.create') }}">
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
