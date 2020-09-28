<form action="{{ route('admin.'. $route .'.destroy', ['id' => $data->id]) }}" method="post">
    @method('delete')
    @csrf
    <div class='btn-group'>
        <a data-id={{ $data->id }}  href='{{ route('admin.' . $route . '.edit', ['id' => $data->id]) }}'  class='btn btn-default btn-xs update-provider'><i
                class="fa fa-edit"></i></a>
        <button type="button" class="btn btn-danger btn-xs remove" data-id={{ $data->id }}><i class="fa fa-trash"></i></button>
            @if ($route !== 'order' && $route !== 'invoice')
            <a href='{{ route('admin.order.index', ['id' => $data->role == 'client' ? 2 : 3,'search' => $data->name]) }}'  class='btn btn-xs yellow' title='Show his orders'><i
                class="fa fa-search"></i></a>
            @endif
       
    </div>

</form>
