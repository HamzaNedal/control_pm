<form action="{{ $action }}"  method="post" >
    @csrf
    @isset($updateForm)
         @method('put')
    @endisset
    <div class="row">
          <div class="form-group col-md-12">
            <label for="phone" class="col-form-label">Phone :</label>
            <input type="text" class="form-control" name="phone" @isset($user) value="{{$user->phone }}" @endisset id="subjects">
          </div>
          <div class="form-group col-md-12">
            <label for="Payment" class="col-form-label">Payment :</label>
            <input type="text" class="form-control" name="Payment" @isset($user) value="{{$user->Payment }}" @endisset id="country">
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