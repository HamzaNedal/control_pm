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
                        <i class="fa fa-globe"></i>Orders On Progress
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

                            </div>
                        </div>
                    </div>
                    @include('provider_pages.order-onprogress.table')
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

    <script src="http://malsup.github.com/jquery.form.js"></script>

        <script>
       $(function() {
       $(document).on('click','.saveFiles',function() {
              var action = $(this).parent().parent().children().find('.formUpload').attr('action');
              var formData = new FormData($(this).parent().parent().children().find('.formUpload')[0]);


            });
       });
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

              ajax: '{!! route('order.onprogress.datatable') !!}',
              columns: [
                  { data: 'order_number' },
                 { data: 'deadline' },
                  { data: 'added_date' },
                  { data: 'status'  },
                  { data: 'details'  },
                  { data: 'Delivery'  },
                  { data: 'files'  },

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
