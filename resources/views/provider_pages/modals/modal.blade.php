<button type="button" data-toggle="modal" data-target="#modal-{{ $data->id }}" class='icon-btn btn blue' style=' color:#fff ; height:50px'>
    <i class='fa fa-file-o'></i>

    <div style='color:#fff'>
    Details
    </div>
    </button>
<div class="modal fade" id="modal-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-{{ $data->id }}Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-{{ $data->id }}Title">Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" class="scroller" style="height:300px;word-wrap: break-word;overflow-y: scroll;" data-always-visible="1" data-rail-visible1="1" >
          
          @if($data->status != 'Edit')
            <p>{{ $data->information }}</p>
          @else
            <p>{{ $data->information_return }}</p>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
