@extends('admin.layouts.app')
@section('page_title', 'Add Event')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-datetimepicker.min.css') }}">
    
@endpush
@section('content')

<div class="page-content fade-in-up">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox">
        <div class="ibox-head">
          <div class="ibox-title">Create Event</div>

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
            <form method="post" action="{{ route('event.store') }}" enctype="multipart/form-data">
                <div class="row">

                <div class="col-sm-8">
              @csrf
              <div class="row">
                <div class="col-md-10">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{old('title')}}"
                      placeholder="Enter title">
                  </div>

                  <div class="form-group">
                    <label>Select Guest</label>
                    <select class="form-control" name="guest_id"> 
                      <option value="">Select Guest...</option>
                      @forelse ($allGuests as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @empty
                        <option value="">No Series Found!</option>
                      @endforelse
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Select Series</label>
                    <select class="form-control" name="series_id"> 
                      <option value="">Select Series...</option>
                      @forelse ($allSeries as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @empty
                        <option value="">No Series Found!</option>
                      @endforelse
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="datetimepicker">Date Picker</label>
                    <div id="datetimepicker" class="input-append date" >
                      <input type="text" name="datetime" data-format="MM-dd-yyyy HH:mm:ss">
                      <span class="add-on">
                        <button class="btn btn-warning btn-sm" style="margin-top:-2px">Select Date</button>
                      </span>
                    </div>
                  </div>
  
                  <div class="form-group">
                    <label>Video Link</label>
                    <input type="text" class="form-control" name="video_link" value="{{old('video_link')}}"
                      placeholder="Enter Video Link">
                  </div>

                  <div class="form-group">
                    <label for="highlight_text">Highlight Text</label>
                    <textarea name="highlight_text" id="highlight_text" cols="30" rows="3" class="form-control" placeholder="Enter Highlight Text" value="{{old('highlight_text')}}"> </textarea>
                  </div>
  
                  <div class="form-group">
                    <label>Descriptions</label>
                    <textarea name="descriptions" id="" cols="30" rows="10" class="form-control" placeholder="Enter Descriptions..." value="{{old('descriptions')}}"> </textarea>
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
                        <label>Select Banner Image</label>
                        <input type="file" id="fileUpload" class="form-control" name="banner_image">
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