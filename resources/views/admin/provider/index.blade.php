@extends('base_layout.master_layout')

@section('title','Providers')
@section('content')

    <div class="page-bar"></div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>Providers Management
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
                                    <a  class="btn green" data-toggle="modal" href="{{ route('admin.provider.create') }}">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right buttons">

                                </div>
                            </div>
                        </div>
                    </div>
                    @include('admin.provider.table')
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
              ajax: '{!! route('admin.provider.datatable') !!}',
              columns: [
                  { data: 'id', name: 'id' },
                  {data: 'actions', name: 'actions', orderable: false, searchable: false},
                  { data: 'name', name: 'name' },
                  { data: 'email', name: 'email' },
                  { data: 'payment_method', name: 'payment_method' },
                  { data: 'education_level', name: 'education_level' },
                  { data: 'name_university', name: 'name_university' },
                  { data: 'years_experience', name: 'years_experience' },
                  { data: 'capacity_day', name: 'capacity_day' },
                  { data: 'subjects', name: 'subjects' },
                  { data: 'country', name: 'country' },
                  { data: 'whats_up', name: 'whats_up' },
              ],

          });



          $(document).on('click','.remove',function(){
          var url = "{{ route('admin.provider.destroy') }}/";
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
