

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

@endpush


<div class="row">
  <div class="col-md-12 stretch-card">
    <div class="card">
      <div class="card-body">

            <form class="forms-sample" action="{{url('management/events/store-event-category')}}" method="post" id="form-login" autocomplete="off">

                {{csrf_field()}}
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Merchant</label>
                    <select type="text"  id="Merchant" class="form-control" required   name="Merchant" >
                        <option selected disabled value="">--select merchant---</option>
                        @foreach($merchants['result'] as $row)
                            <option value="{{$row['TinNo']}}">{{$row['ServiceProviderName']}}</option>
                        @endforeach
                    </select>
                  </div>
              </div><!-- Col -->
              <div class="col-sm-6">
                <div class="form-group">

                    <label class="control-label">MerchantServCode</label>
                    <select type="text"  class="form-control" id="MerchantServCode" required  name="MerchantServCode" >

                    </select>
                </div>
              </div><!-- Col -->
            </div><!-- Row -->

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Category name</label>
                    <select type="text"  id="CategoryCode" class="form-control" required name="CategoryCode" >
                        <option selected disabled value="">--select category name---</option>
                    </select>
                </div>
              </div><!-- Col -->
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">MaximumCapacity</label>
                    <input type="text" value="{{old('MaximumCapacity')}}" class="form-control" required  name="MaximumCapacity" placeholder="MaximumCapacity">
                </div>
              </div><!-- Col -->
            </div><!-- Row -->

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">

                    <label class="control-label">Price</label>
                    <input type="text" value="{{old('Price')}}" class="form-control" required  name="Price" placeholder="Price">

                </div>
              </div><!-- Col -->
              <div class="col-sm-6">
                <div class="row">
                    <div class="form-group col-5" style="float: left">

                        <label>Price code</label>
                        <input type="text" readonly value="{{old('PriceCode',$priceCode->PriceCode)}}" class="form-control" required  name="PriceCode" placeholder="PriceCode">

                    </div>

                    <div class="form-group col-7" style="float: left">

                        <label>Status</label>
                        <select type="text"  class="form-control" id="Status" required  name="Status" >


                            <option selected  value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>

                    </div>

                </div>
              </div><!-- Col -->
            </div><!-- Row -->


          <button type="submit" class="btn btn-primary submit">Submit</button>
          </form>
      </div>
    </div>
  </div>
</div>


@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/typeahead-js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/form-validation.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
  <script src="{{ asset('assets/js/inputmask.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>
  <script src="{{ asset('assets/js/typeahead.js') }}"></script>
  <script src="{{ asset('assets/js/tags-input.js') }}"></script>
  <script src="{{ asset('assets/js/dropzone.js') }}"></script>
  <script src="{{ asset('assets/js/dropify.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-colorpicker.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
  <script src="{{ asset('assets/js/timepicker.js') }}"></script>

  
    <script>
        $(function () {

            let merchant  =  $('#Merchant');

            merchant.change(function (evt) {

                console.log("code : "+merchant.val())
                $("#MerchantServCode").html('');
                jQuery.get('{{url('management/events/get-merchant-code')}}/'+merchant.val(), function (data) {

                    console.log(data.result);

                    if(data.resultcode!='01'){

                        $("#MerchantServCode").append('<option selected disabled value="">--select merchant service name</option>');
                        for(let i=0; i<data.result.length; i++){

                            let code  =  data.result;
                            console.log(code[i].MerchantServiceCode);

                            $("#MerchantServCode").append('<option value='+code[i].MerchantServiceCode+'>'+code[i].ServiceName+'</option>');

                        }
                    }

                });

            });

            let MerchantServCode  =  $('#MerchantServCode');

            MerchantServCode.change(function (evt) {

                console.log("code : "+MerchantServCode.val());
                $("#CategoryCode").html('');

                jQuery.get('{{url('management/events/get-merchant-ticket-category')}}/'+MerchantServCode.val(), function (data) {

                    console.log(data.result);

                    if(data.resultcode!='01'){

                        // $("#CategoryCode").append('<option selected disabled value="">--select merchant service name</option>');
                        for(let i=0; i<data.result.length; i++){

                            let code  =  data.result;
                            console.log(code[i].CategoryCode);

                            $("#CategoryCode").append('<option value='+code[i].CategoryCode+'>'+code[i].CategoryName+'</option>');

                        }
                    }

                });

            });
        });
    </script>
@endpush