<form action="{{ $action }}"  method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-12">
            <div class="form-group">
            <label for="email" class="col-form-label">name:</label>
            <input type="name" class="form-control" name="name" id="name" value="{{ config('mail.from.name') }}" value="{{ old('name') }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ config('mail.mailers.smtp.username') }}" value="{{ old('email') }}">
            </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
          <label for="password" class="col-form-label">Password:</label>
          <input type="password" class="form-control" value="{{ config('mail.mailers.smtp.password') }}" name="password" id="password">
          </div>
      </div>

 
    <div class="form-actions right">
      <button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
    </div>
  </form>