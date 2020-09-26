<form action="{{ $action }}"  method="post" >
    @csrf
    @isset($updateForm)
         @method('put')
    @endisset
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
        <label for="name" class="col-form-label">Name:</label>
        <input type="text" class="form-control" name="name" id="name" @isset($user) value="{{$user->name }}" @endisset >
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="password" class="col-form-label">Password :</label>
            <input type="password" class="form-control" name="password" id="password">
            </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
          <label for="email" class="col-form-label">Email :</label>
          <input type="email" class="form-control" name="email"  @isset($user) value="{{$user->email }}" @endisset id="email">
          </div>
    </div>
          <div class="form-group col-md-12">
            <label for="phone" class="col-form-label">Phone :</label>
            <input type="text" class="form-control" name="phone" @isset($user) value="{{$user->phone }}" @endisset id="subjects">
          </div>
          <div class="form-group col-md-12">
            <label for="Payment" class="col-form-label">Payment :</label>
            <input type="text" class="form-control" name="payment" @isset($user) value="{{$user->Payment }}" @endisset id="country">
          </div>
          <div class="form-group col-md-12">
            <label for="words" class="col-form-label">Words :</label>
            <input type="number" class="form-control" name="words" @isset($user) value="{{$user->words }}" @endisset id="whats_up">
          </div>
    </div>

    <div class="form-actions right">
      <button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
    </div>
  </form>
