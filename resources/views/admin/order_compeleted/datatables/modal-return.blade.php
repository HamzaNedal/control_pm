<button  type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-return-{{ $data->id }}" alt='send to edit' title='send to edit'><i class='fa fa-undo'></i></button>

<div class="modal fade" id="modal-return-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-return-{{ $data->id }}Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-return-{{ $data->id }}Label">Infromation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='' method='post'>
	    @csrf
          <div class="form-group">
            <label for="message-text" class="col-form-label">Infromation :</label>
            <textarea class="form-control" id="message-text-{{ $data->id }}"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" data-dismiss="modal" class="btn btn-primary sendOrder" data-message={{ 'message-text-'.$data->id }} data-name='{{ $data->getProvider->name }}'   data-id='{{ $data->id }}'>Send</button>
      </div>
    </div>
  </div>
</div>