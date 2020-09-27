<form action="{{ $action }}"  method="post" enctype="multipart/form-data">
    @csrf
    @isset($updateForm)
         @method('put')
    @endisset
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="title" class="col-form-label">Title:</label>
            <input type="text" class="form-control" name="title" id="title" @isset($order) value="{{$order->title }}" @endisset >
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
          <label for="number_words" class="col-form-label">Number Words:</label>
          <input type="text" class="form-control" name="number_words" id="number_words" @isset($order) value="{{$order->number_words }}" @endisset >
          </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
        <label for="information" class="col-form-label">Information :</label>
        <textarea  cols="15" rows="4.5" class="form-control" name="information" id="information">@isset($order) {{$order->information }} @endisset</textarea>
        </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
      <label for="added_date" class="col-form-label">Added Date :</label>
      <input type="date" class="form-control form-filter input-sm"  name="added_date" placeholder="From" @isset($order) value="{{$order->added_date }}" @endisset>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
      <label for="deadline" class="col-form-label">Deadline :</label>
      <input type="date" class="form-control form-filter input-sm"  name="deadline" placeholder="To" @isset($order) value="{{$order->deadline }}" @endisset>
      </div>
    </div>
		<div class="col-md-6">
      <div class="form-group">
        <label class="control-label">Providers :</label>
        <select class="select2_category form-control" data-placeholder="Choose a Provider" name="provider_id" tabindex="1">
          @foreach ($providers as $provider)
            <option value="{{ $provider->id }}" @isset($order) {{ $order->provider_id == $provider->id ? "selected" : "" }} @endisset>{{ $provider->name }}</option>
          @endforeach
        </select>
       <small><a href="{{ route('admin.provider.create') }}">Add New Provider</a></small>
      </div>
    </div>
		<div class="col-md-6">
      <div class="form-group">
        <label class="control-label">Clients :</label>
        <select class="select2_category form-control" data-placeholder="Choose a Client" name="client_id" tabindex="1">
          @foreach ($clients as $client)
            <option value="{{ $client->id }}" @isset($order) {{ $order->client_id == $client->id ? 'selected' : '' }} @endisset>{{ $client->name }}</option>
          @endforeach
        </select>
        <small><a href="{{ route('admin.client.create') }}">Add New Client</a></small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="files" class="control-label">Files</label>
          <input type="file" id="files" name="files[]" multiple>
      </div>
    </div>
    </div>

    <div class="form-actions right">
      <button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
    </div>
  </form>

  <form id="fileupload" action="../assets/global/plugins/jquery-file-upload/server/php/" method="POST" enctype="multipart/form-data">
    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
    <div class="row fileupload-buttonbar">
        <div class="col-lg-7">
            <!-- The fileinput-button span is used to style the file input field as button -->
            <span class="btn green fileinput-button">
                <i class="fa fa-plus"></i>
                <span> Add files... </span>
                <input type="file" name="files[]" multiple=""> </span>
            <button type="submit" class="btn blue start">
                <i class="fa fa-upload"></i>
                <span> Start upload </span>
            </button>
            <button type="reset" class="btn warning cancel">
                <i class="fa fa-ban-circle"></i>
                <span> Cancel upload </span>
            </button>
            <button type="button" class="btn red delete">
                <i class="fa fa-trash"></i>
                <span> Delete </span>
            </button>
            <input type="checkbox" class="toggle">
            <!-- The global file processing state -->
            <span class="fileupload-process"> </span>
        </div>
        <!-- The global progress information -->
        <div class="col-lg-5 fileupload-progress fade">
            <!-- The global progress bar -->
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar progress-bar-success" style="width:0%;"> </div>
            </div>
            <!-- The extended global progress information -->
            <div class="progress-extended"> &nbsp; </div>
        </div>
    </div>
    <!-- The table listing the files available for upload/download -->
    <table role="presentation" class="table table-striped clearfix">
        <tbody class="files"> </tbody>
    </table>
</form>
