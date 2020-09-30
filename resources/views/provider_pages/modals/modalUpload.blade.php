<button class='icon-btn btn green'  data-toggle="modal" data-target="#modalupload-{{ $data->id }}" style=' color:#fff ; 50px'>
    <i class='fa fa-paper-plane-o'></i>

    <div style='color:#fff'>
    Delivery
    </div>
    </button>

<div class="modal fade" id="modalupload-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="modalupload-{{ $data->id }}Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header    ">
          <h5 class="modal-title" id="modalupload-{{ $data->id }}Title">Upload</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"  style="height:100px;word-wrap: break-word;" data-always-visible="1" data-rail-visible1="1" >
            <form action="{{ route('provider.upload.files') }}" id="formUpload" class="formUpload"  method="post"  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="order_id" id="order_id" value="{{ $data->id }}">
                <div class="row">
                    <div class="uploadImageLine"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Files:</label>
                            <input type="file" class="form-control" name="files[]" id="files" multiple>
                        </div>
                    </div>
                </div>



        </div>
        <div class="modal-footer">
        <button type="submit" class="btn blue saveFiles"><i class="fa fa-check"></i>Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div>


