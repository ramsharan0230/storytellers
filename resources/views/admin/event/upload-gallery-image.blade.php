@extends('admin.layouts.app')
@section('page_title', 'Add Event Images')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-datetimepicker.min.css') }}">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
@endpush
@section('content')

<div class="page-content fade-in-up">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox">
        <div class="ibox-head">
          <div class="ibox-title">Create Event Gallery</div>

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
            <form method="post" action="{{ route('event.gallery.store') }}" enctype="multipart/form-data">
                @csrf  
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label value="">Select Event...</label>
                            <select onchange="getSelectedEventValue(this);" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="event_id">
                                <option value="">Select Event...</option>
                                @forelse ($events as $event)
                                    <option value="{{ $event->id }}" data-subtext="{{ $event->organization }}">{{ $event->title }}</option>
                                @empty
                                  <option value="">No Event Found!</option>
                                @endforelse
                            </select>
                          </div>  
                    </div>
                    <div class="col-sm-4">
                        <div class="check-list mt-3">
                            <br>
                            <label class="ui-checkbox ui-checkbox-primary">
                              <input name="publish" type="checkbox" onclick="getPublishedValue(this)" checked >
                              <span class="input-span"></span>Publish</label>
                          </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="image-file">Select Multiple Event Photos</label>
                            <div class="file-loading">
                                <input id="image-file" type="file" name="file" accept="image/*" data-min-file-count="1" multiple>
                            </div>
                        </div> 
                    </div>
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
<script type="text/javascript">
    var event_id='';
    var publish='';
    function getSelectedEventValue(item)
    {
        event_id = item.value
    }

    function getPublishedValue(item){
        if(item.value =='on')
            publish = 1
        else
            publish = 0
    }
    
    $("#image-file").fileinput({
        theme: 'fa',
        uploadUrl: "/admin/event/gallery/store",
        method: "POST",
        allowedFileExtensions: ['jpg', 'png', 'gif','jpeg'],
        overwriteInitial: false,
        maxFileSize:2048,
        maxFilesNum: 10,
        uploadExtraData: function() {
            return {
                _token: "{{ csrf_token() }}",
                event_id:event_id,
                publish: publish
            };
        }
    });
  </script>
@endpush