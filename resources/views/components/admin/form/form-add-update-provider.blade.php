<form action="{{ $action }}"  method="post" id="{{ $id }}">
    @csrf
    @isset($updateForm)
        <input type="hidden" name="user_id" value="" class="user_id">
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
        <div class="col-md-6">
          <div class="form-group">
              <label for="email" class="col-form-label">Email :</label>
              <input type="email" class="form-control" name="email"  @isset($user) value="{{$user->email }}" @endisset id="email">
              </div>
      </div>
        <div class="form-group col-md-6">
            <label for="payment_method" class="col-form-label">Payment Method :</label>
            <input type="text" class="form-control" name="payment_method" @isset($user) value="{{$user->payment_method }}" @endisset id="payment_method">
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="education_level" class="col-form-label">Education Level :</label>
                <input type="text" class="form-control" name="education_level" @isset($user) value="{{$user->education_level }}" @endisset  id="education_level">
              </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="name_university" class="col-form-label">University Name :</label>
                <input type="text" class="form-control" name="name_university" @isset($user) value="{{$user->name_university }}" @endisset id="name_university">
              </div>
          </div>

          <div class="form-group col-md-6">
            <label for="years_experience" class="col-form-label">Years Experience :</label>
            <input type="number" class="form-control"  name="years_experience" @isset($user) value="{{$user->years_experience }}" @endisset id="years_experience">
          </div>
          <div class="form-group col-md-6">
            <label for="capacity_day" class="col-form-label">Capacity Day :</label>
            <input type="number" class="form-control" name="capacity_day" @isset($user) value="{{$user->capacity_day }}" @endisset id="capacity_day">
          </div>
          <div class="form-group col-md-12">
            <label for="subjects" class="col-form-label">Subjects :</label>
            <br>
            {{-- <input type="text" class="form-control" name="subjects" @isset($user) value="{{$user->subjects }}" @endisset id="subjects"> --}}
            <input type="text" class="form-control" name="subjects" @isset($user) value="{{$user->subjects }}" @endisset value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" >

        </div>
          <div class="form-group col-md-12">
            <label for="country" class="col-form-label">Country :</label>
            <input type="text" class="form-control" name="country" @isset($user) value="{{$user->country }}" @endisset id="country">
          </div>
          <div class="form-group col-md-12">
            <label for="whats_up" class="col-form-label">Whats up :</label>
            <input type="text" class="form-control" name="whats_up" @isset($user) value="{{$user->whats_up }}" @endisset id="whats_up">
          </div>
    </div>

    <div class="form-actions right">
      <button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
    </div>
  </form>
