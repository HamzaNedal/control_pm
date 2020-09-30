<form action="{{ $action }}"  method="post" enctype="multipart/form-data">
    @csrf
    @isset($updateForm)
         @method('put')
    @endisset
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="title" class="col-form-label">Title:</label>
            <input type="text" class="form-control" name="title" id="title" @isset($order) value="{{$order->title }}" @endisset  value="{{ old('title') }}">
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
          <label for="number_words" class="col-form-label">Number Words:</label>
          <input type="text" class="form-control" name="number_words" id="number_words" @isset($order) value="{{$order->number_words }}" @endisset value="{{ old('number_words') }}">
          </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
        <label for="information" class="col-form-label">Information :</label>
        <textarea  cols="15" rows="4.5" class="form-control" name="information" id="information">@isset($order) {{$order->information }} @endisset{{ old('information') }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
      <label for="added_date" class="col-form-label">Added Date :</label>
      <input type="date" class="form-control form-filter input-sm"  name="added_date" placeholder="From" @isset($order) value="{{$order->added_date }}" @endisset value="{{ old('added_date') }}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
      <label for="deadline" class="col-form-label">Deadline :</label>
      <input type="date" class="form-control form-filter input-sm"  name="deadline" placeholder="To" @isset($order) value="{{$order->deadline }}" @endisset value="{{ old('deadline') }}">
      </div>
    </div>
		<div class="col-md-6">
      <div class="form-group">
        <label class="control-label">Providers :</label>
        <select class="select2_category form-control" data-placeholder="Choose a Provider" name="provider_id" tabindex="1" value="{{ old('provider_id') }}">
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
        <select class="select2_category form-control" data-placeholder="Choose a Client" name="client_id" tabindex="1" value="{{ old('client_id') }}">
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
    @isset($order)
    <div class="col-md-6">
      <div class="form-group">
        <label for="files" class="control-label">Files Download</label>
        @php
            $order->files = explode(',',$order->files);
        @endphp
        @foreach ($order->files as $file)
        <p><a target="_blank" href="{{ asset('files/'.$file) }}">{{ $file }}</a></p>
           
        @endforeach
          
      </div>
    </div>
    @endisset
  

    </div>

    <div class="form-actions right">
      <button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
    </div>
  </form>


