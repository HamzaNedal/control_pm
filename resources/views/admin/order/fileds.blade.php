<form action="{{ $action }}"  method="post" enctype="multipart/form-data">
    @csrf
    @isset($updateForm)
         @method('put')
    @endisset
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" name="name" id="name" @isset($order) value="{{$order->name }}" @endisset >
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
      <input type="date" class="form-control form-filter input-sm"  name="added_date" placeholder="From">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
      <label for="deadline" class="col-form-label">Deadline :</label>
      <input type="date" class="form-control form-filter input-sm"  name="deadline" placeholder="To">
      </div>
    </div>
		<div class="col-md-6">
      <div class="form-group">
        <label class="control-label">Providers :</label>
        <select class="select2_category form-control" data-placeholder="Choose a Provider" name="provider" tabindex="1">
          @foreach ($providers as $provider)
            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
          @endforeach
        </select>
       <small><a href="{{ route('admin.provider.create') }}">Add New Provider</a></small>
      </div>
    </div>
		<div class="col-md-6">
      <div class="form-group">
        <label class="control-label">Clients :</label>
        <select class="select2_category form-control" data-placeholder="Choose a Client" name="client" tabindex="1">
          @foreach ($clients as $client)
            <option value="{{ $client->id }}">{{ $client->name }}</option>
          @endforeach
        </select>
        <small><a href="{{ route('admin.client.create') }}">Add New Client</a></small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="files" class="control-label">Files</label>
          <input type="file" id="files" multiple>
      </div>
    </div>
    </div>
 
    <div class="form-actions right">
      <button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
    </div>
  </form>