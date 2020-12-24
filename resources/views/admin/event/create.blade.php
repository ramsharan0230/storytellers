@extends('admin.layouts.app')
@section('page_title', 'Add Event')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-datetimepicker.min.css') }}">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
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
                    <label value="">Select Guest...</label>
                    <select class="selectpicker form-control" name="guest_id" data-show-subtext="true" data-live-search="true">
                        <option value="">Select Guest...</option>
                        @forelse ($allGuests as $item)
                            <option value="{{ $item->id }}" data-subtext="{{ $item->organization }}">{{ $item->name }}</option>
                        @empty
                          <option value="">No Series Found!</option>
                        @endforelse
                    </select>
                    <br>
                  </div>

                  <div class="form-group">
                    <label>Select Series</label>
                    <select class="selectpicker form-control" name="series_id"  data-show-subtext="true" data-live-search="true" name="series_id">
                      <option value="">Select Series...</option>
                      @forelse ($allSeries as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @empty
                        <option value="">No Series Found!</option>
                      @endforelse
                    </select>
                    <br>
                  </div>

                  <div class="form-group">
                    <label for="first_patagraph">Above Text Highlight(First)</label>
                    <textarea name="first_patagraph" id="" rows="3" class="ckeditor form-control" placeholder="Paragraph Description...">{{old('first_patagraph')}} </textarea>
                  </div>

                  <div class="form-group">
                    <label for="second_patagraph">Above Text Highlight(Second)</label>
                    <textarea name="second_patagraph" id="" rows="3" class="ckeditor form-control" placeholder="Paragraph Description...">{{old('second_patagraph')}} </textarea>
                  </div>

                  <div class="form-group">
                    <label for="highlight_text">Highlight Text</label>
                    <textarea name="highlight_text" id="highlight_text" rows="3" class="form-control" placeholder="Enter Highlight Text" >{{old('highlight_text')}} </textarea>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-7">
                        <div class="form-group">
                          <label>Date</label>
                          <input class="form-control" type="date" name="date"  value="{{old('date')}}">
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <label>Time</label>
                          <input class="form-control" type="time" name="time" value="{{old('time')}}">
                        </div>
                      </div>
                    </div>
                  </div>
  
                  <div class="form-group">
                    <label>Video Link</label>
                    <input type="text" class="form-control" name="video_link" value="{{old('video_link')}}"
                      placeholder="Enter Video Link">
                  </div>

                  <div class="form-group">
                    <label for="descriptions">Descriptions</label>
                    <textarea name="descriptions" id="descriptions" rows="10" class="ckeditor form-control" placeholder="Enter Descriptions..." value="{{old('descriptions')}}"> </textarea>
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
                <button class="btn btn-primary" onclick="createEvent()" type="submit">Submit</button>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js"> </script>
<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js"></script>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script type="text/javascript">
      $(document).ready(function () {
          $('.ckeditor').ckeditor();
      });
  </script>
@endpush