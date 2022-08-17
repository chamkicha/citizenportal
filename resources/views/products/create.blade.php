@extends('layout.master')

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

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/products/index') }}">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>


<div class="row">
  <div class="col-md-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Create products</h6>
                    @include('partial.flash_error')

            <form class="forms-sample" action="{{url('/products/store')}}" enctype="multipart/form-data" method="post" id="form-login" autocomplete="off">

                {{csrf_field()}}
            
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Name</label>
                  <input name="name" required  type="text" class="form-control" placeholder="Enter description Name">
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">description</label>
                  <input name="description"  type="text" class="form-control" placeholder="Enter description">
                </div>
             
              </div><!-- Col -->

              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">price</label>
                  <input name="price" required  type="number" class="form-control" placeholder="Enter price">
                </div>
               
              </div><!-- Col -->

              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">categories_id</label>
                  
                  <select type="text"  class="form-control" required  name="categories_id" id="categories_id" >
                    <option selected disabled>--select category--</option>
                    @foreach($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->category_name}}</option>
                    @endforeach
                </select>

                </div>
               
              </div><!-- Col -->

              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">image</label>
                  <input name="image" required  type="file" class="form-control" placeholder="Enter price">
                </div>
               
              </div><!-- Col -->

            </div><!-- Row -->




          <button type="submit" class="btn btn-primary submit">Submit</button>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection

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
        let block_no  =  $('#block_no');
        block_no.change(function () {
                console.log("block_no : "+block_no.val())
                $("#floor_no").html('');
                $.ajax({
                    type: 'get',
                    url: '{!!URL::to('management/floors/get_floor')!!}'+ '/' + block_no.val(),
                    success: function(data){
                                $("#floor_no").append('<option value="">Select Floor</option>');
                                for(let i=0; i<data.length; i++){

                                    let code  =  data;
                                    console.log(code[i].name);
                                    $("#floor_no").append('<option value='+code[i].id+'>'+code[i].name+'</option>');
                                }
                    },
                    error: function(){
                        console.log('failed');
                    }
                });
            });

    </script>



@endpush