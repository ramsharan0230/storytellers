@extends('admin.layouts.app')
@section('page_title', 'Add Guest')
@push('styles')
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
          <div class="ibox-title">Create Guest</div>

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
                    <form method="post" action="{{ route('guest.store') }}" enctype="multipart/form-data">
                        <div class="row">

                        <div class="col-sm-8">
                      @csrf
                      <input type="hidden" name="role" value="admin">
                      <div class="row">
                        <div class="col-md-10">
          
                          <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}"
                              placeholder="Enter full name">
                          </div>
          
                          <div class="form-group">
                            <label>Designation</label>
                            <input type="text" class="form-control" name="designation" value="{{old('designation')}}"
                              placeholder="Enter designation">
                          </div>

                          <div class="form-group">
                            <label>Organization</label>
                            <input type="text" class="form-control" name="organization" value="{{old('organization')}}" placeholder="Enter Organization">
                          </div>
          
                          <div class="form-group">
                            <label>Descrptions</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Enter Password" value="{{old('password')}}"> </textarea>
                          </div>
          
                          <div class="check-list">
                            <label class="ui-checkbox ui-checkbox-primary">
                              <input name="publish" type="checkbox" checked>
                              <span class="input-span"></span>Publish</label>
                          </div>
                        </div>
                      </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" id="fileUpload" class="form-control" value="" name="photo">
                                <div id="wrapper" class="mt-2">
                                  <div id="image-holder">
                                  </div>
                                </div>
                              </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                    </form>
                  </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
@include('admin.layouts._partials.imagepreview')
<script>
    $(function() {
      // Multiple images preview in browser
      var imagesPreview = function(input, placeToInsertImagePreview) {
        console.log(input.files);
        console.log(placeToInsertImagePreview);
  
          if (input.files) {
              var filesAmount = input.files.length;
  
              for (i = 0; i < filesAmount; i++) {
                  var reader = new FileReader();
  
                  reader.onload = function(event) {
                      $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview).css({'width' : '150px' , 'height' : '150px', 'margin-right': '10px', 'margin-top': '10px'});
                  }
  
                  reader.readAsDataURL(input.files[i]);
              }
          }
  
      };
  
      $('#gallery-photo-add').on('change', function() {
          imagesPreview(this, 'div.gallery');
      });
  });
  
  
  </script>
@endpush

{{--
<div class="form-group">
  <label>Image</label>
  <input id="fileUpload1" class="form-control" value="{{old('image')}}" name="image" type="file">
<div id="wrapper" class="mt-2">
  <div id="image-holder1">
  </div>
</div>
</div>

<div class="form-group">
  <label>Logo</label>
  <input id="fileUpload2" class="form-control" value="{{old('logo')}}" name="logo" type="file">
  <div id="wrapper" class="mt-2">
    <div id="image-holder2">
    </div>
  </div>
</div> --}}

{{-- <script>
  $(document).ready(function() {
        fileUpload('#fileUpload1', '#image-holder1');
        fileUpload('#fileUpload2', '#image-holder2');
    });
    function fileUpload($selector, $imageHolder) {
        $($selector).on('change', function() {
            if (typeof(FileReader) != "undefined") {
                var image_holder = $($imageHolder);
                // $("#image-holder").siblings().remove();
                $($imageHolder).children().remove();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image",
                        "width": '50%'
                    }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("This browser does not support FileReader.");
            }
        });
    }
</script> --}}