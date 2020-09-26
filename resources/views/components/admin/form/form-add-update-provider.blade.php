<form action="{{ $action }}"  method="post" id="{{ $id }}">
    @csrf
    @isset($inputIdForUpdate)
        {{ $inputIdForUpdate }}
    @endisset
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" name="name" id="name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password" class="col-form-label">Password :</label>
                <input type="password" class="form-control" name="password" id="password">
                </div>
        </div>
        <div class="form-group col-md-12">
            <label for="payment_method" class="col-form-label">Payment Method :</label>
            <input type="text" class="form-control" name="payment_method" id="payment_method">
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="education_level" class="col-form-label">Education Level :</label>
                <input type="text" class="form-control" name="education_level" id="education_level">
              </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="name_university" class="col-form-label">University Name :</label>
                <input type="text" class="form-control" name="name_university" id="name_university">
              </div>
          </div>

          <div class="form-group col-md-12">
            <label for="years_experience" class="col-form-label">Years Experience :</label>
            <input type="number" class="form-control"  name="years_experience" id="years_experience">
          </div>
          <div class="form-group col-md-12">
            <label for="capacity_day" class="col-form-label">Capacity Day :</label>
            <input type="number" class="form-control" name="capacity_day" id="capacity_day">
          </div>
          <div class="form-group col-md-12">
            <label for="subjects" class="col-form-label">Subjects :</label>
            <input type="text" class="form-control" name="subjects" id="subjects">
          </div>
          <div class="form-group col-md-12">
            <label for="country" class="col-form-label">Country :</label>
            <input type="text" class="form-control" name="country" id="country">
          </div>
          <div class="form-group col-md-12">
            <label for="whats_up" class="col-form-label">Whats up :</label>
            <input type="text" class="form-control" name="whats_up" id="whats_up">
          </div>
    </div>
 
    
  </form>