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
                    @include('provider_pages.order-modification.table')
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
        $(document).on('click','.saveFiles',function() {
              var action = $(this).parent().parent().children().find('.formUpload').attr('action');
              var order_id = $(this).parent().parent().children().find('.formUpload').find('#order_id');
              var formData = new FormData($(this).parent().parent().children().find('.formUpload')[0]);
   
              $.ajax({
                    xhr: function() {
                        $('.uploadImageLine').html(` <div class="progress-bar" role="progressbar" aria-valuenow=""
                        aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            0%
                        </div>`);
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = (evt.loaded / evt.total) * 100;
                                $('.progress-bar').text(Math.floor(percentComplete) + '%');
                                $('.progress-bar').css('width',Math.floor(percentComplete) + '%');
                                if(Math.floor(percentComplete) == 100){
                                    $('.progress-bar').text('Processing...');
                                }
                            }
                    }, false);
                    return xhr;
                    },
                    type: 'POST',
                    url: action,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        $('.progress-bar').text('Done');
                        $('.progress-bar').css('background-color', 'green');
                        location.href = "{{ url()->current() }}";
                    }
                }).fail(function(data) {
                          var obj = JSON.parse(data.responseText);
                          $('.progress-bar').text('Failed!!');
                          if(obj.errors.files != undefined){
                             $('.progress-bar').append(`<p>${obj.errors.files[0]}</p>`);
                          }
                          if(obj.errors['files.0'] != undefined){
                             $('.progress-bar').append(`<p>${obj.errors['files.0']}</p>`);
                          }
                          $('.progress-bar').css('width', '100%');
                          $('.progress-bar').css('background-color', 'red');
                });

            });
           
        }); 
        $(function() {
          var table = $('#prvider-table').DataTable({
              processing: true,
              serverSide: true,
              'order':[0,'desc'],

              ajax: '{!! route('order.modification.datatable') !!}',
              columns: [
                  { data: 'id' },
                  { data: 'deadline' },
                  { data: 'added_date' },
                  { data: 'status'  },
                  { data: 'details'  },
                  { data: 'Delivery'  },

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
