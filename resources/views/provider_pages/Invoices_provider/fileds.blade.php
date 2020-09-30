<form action=""  method="" enctype="multipart/form-data">
    @csrf
    @isset($updateForm)
         @method('put')
    @endisset
    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
            <label for="invoicenumber" class="col-form-label">Invoice number:</label>
            <input type="number" disabled class="form-control" name="invoicenumber" id="invoicenumber" @isset($invoice) value="{{$invoice->id }}" @endisset  value="{{ old('id') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="payment_method" class="col-form-label">Date :</label>
            <input type="text" disabled class="form-control" name="payment_method" id="payment_method" @isset($invoice) value="{{$invoice->date }}" @endisset value="{{ old('date') }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
            <label for="down_payment" class="col-form-label">Down payment:</label>
            <input type="number" disabled class="form-control" name="down_payment" id="down_payment" @isset($invoice) value="{{$invoice->down_payment }}" @endisset  value="{{ old('down_payment') }}">
            </div>
        </div>


        <div class="col-md-6">
          <div class="form-group">
          <label for="payment_method" class="col-form-label">Payment method:</label>
          <input type="text" disabled class="form-control" name="payment_method" id="payment_method" @isset($invoice) value="{{$invoice->payment_method }}" @endisset value="{{ old('payment_method') }}">
          </div>
      </div>




		{{-- <div class="col-md-6">
      <div class="form-group">

      </div>
    </div> --}}


    @isset($invoice)
    <div class="col-md-6">
      <div class="form-group">
        <label for="files" class="control-label">Receipt :</label>
        <p><a target="_blank" href="{{ asset('files/'.$invoice->file) }}" ><i style="font-size:19px"class="fa fa-file-image-o"></i>{{ $invoice->file }}</a></p>
      </div>
    </div>
    @endisset


    </div>


  </form>
