@extends('admin.layouts.app')
@section('page_title', 'Edit user')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-datetimepicker.min.css') }}">

<style media="screen">
  .img-thumbnail:hover {
    background-color: red;
  }

  .image_cover {
    position: relative;
  }

  .cross-button {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
    /* color: red; */
    text-align: center;
    width: 100%;
    height: 100%;
    /* animation-name: fadeInUp;
      animation-duration: .5s; */

  }

  .cross-button:hover {
    background-color: rgba(0, 0, 0, 0.39);
  }

  .cross-button .fa-times {
    font-size: 20px;
    padding-top: 20%;
    text-align: center;
    display: none;
    color: #e6e4e4;
  }

  .cross-button:hover>.fa-times {
    display: block;
  }
</style>
@endpush
@section('content')


<div class="page-content fade-in-up">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox">
        <div class="ibox-head">
          <div class="ibox-title">Edit user</div>

          <div class="ibox-tools">
          </div>
        </div>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="ibox-body" style="">
          <form method="post" action="{{route('user.update',$detail->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" class="form-control" name="name" value="{{$detail->name}}"
                    placeholder="Enter full name">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" value="{{$detail->email}}"
                    placeholder="Enter email">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="text" class="form-control" name="password" value="{{old('password')}}"
                    placeholder="Enter Password">
                </div>

                <div class="form-group">
                  <label>Re-Password</label>
                  <input type="password" class="form-control" name="password_confirmation"
                    value="{{old('password_confirmation')}}" placeholder="Enter Password">
                </div>

                <div class="check-list">
                  <label class="ui-checkbox ui-checkbox-primary">
                    <input name="publish" type="checkbox" {{ $detail->publish == 1 ? 'checked': ''}}>
                    <span class="input-span"></span>Publish</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" id="fileUpload" class="form-control" value="{{ $detail->image }}" name="banner_image">
                  <div id="wrapper" class="mt-2">
                      <div id="image-holder">
                      @if($detail->image)
                      <img src="{{asset('images/thumbnail/'. $detail->image)}}"
                          style="margin-top:12px; margin-bottom:12px;" height="120px" width="120px" alt="">
                      @endif
                      </div>
                  </div>
              </div>
              </div>
            </div>
            <br>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@push('scripts')
<script type="text/javascript"
src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
</script>
<script type="text/javascript"
src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
</script>
<script type="text/javascript"
src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
</script>
<script type="text/javascript">
 $('#datetimepicker').datetimepicker({
   format: 'dd/MM/yyyy hh:mm:ss',
   language: 'en'
 });
</script>
@include('admin.layouts._partials.imagepreview')
<script type="text/javascript" src="/assets/admin/js/sweetalert.js"> </script>
<script>
  $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
       });
$(function() {
  $('#new-image').hide();
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
      // console.log(input.files);
      // console.log(placeToInsertImagePreview);

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview).css({'width' : '100px' , 'height' : '100px', 'margin-right': '10px', 'margin-top': '10px'});
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        $('#new-image').show();
        imagesPreview(this, 'div.gallery');
    });
});

</script>
@endpush