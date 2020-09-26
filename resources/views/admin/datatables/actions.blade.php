<form action="{{ route('admin.'. $route .'.destroy', ['id' => $data->id]) }}" method="post">
    @method('delete')
    @csrf
    <div class='btn-group'>
        <a data-id={{ $data->id }}  href='{{ route('admin.' . $route . '.edit', ['id' => $data->id]) }}'  class='btn btn-default btn-xs update-provider'><i
                class="fa fa-edit"></i></a>
        <button type="button" class="btn btn-danger btn-xs remove"><i class="fa fa-trash"></i></button>

    </div>

</form>
