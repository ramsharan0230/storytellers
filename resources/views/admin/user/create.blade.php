@extends('admin.layouts.app')
@section('page_title', 'Add user')
@push('styles')
<style media="screen">
    .line {
        width: 100%;
        height: 1px;
        background-color: green;
    }
</style>
@endpush
@section('content')

<div class="page-content fade-in-up">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox">
        <div class="ibox-head">
          <div class="ibox-title">Create user</div>

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
          <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="role" value="admin">
            <div class="row">
              <div class="col-md-8">

                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" class="form-control" name="name" value="{{old('name')}}"
                    placeholder="Enter full name">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" value="{{old('email')}}"
                    placeholder="Enter email">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" value="{{old('password')}}"
                    placeholder="Enter Password">
                </div>

                <div class="form-group">
                  <label>Re-Password</label>
                  <input type="password" class="form-control" name="password_confirmation"
                    value="{{old('password_confirmation')}}" placeholder="Enter Password">
                </div>

                <div class="form-group">
                  <label>Select Banner Image</label>
                  <input type="file" id="fileUpload" class="form-control" name="banner_image">
                  <div id="wrapper" class="mt-2">
                    <div id="image-holder">
                    </div>
                  </div>
                </div>

                <div class="check-list">
                  <label class="ui-checkbox ui-checkbox-primary">
                    <input name="publish" type="checkbox" checked>
                    <span class="input-span"></span>Publish</label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <button class="btn btn-primary mt-2" type="submit">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')

@endpush
@push('scripts')
@include('admin.layouts._partials.ckeditorsetting')
@include('admin.layouts._partials.imagepreview')
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