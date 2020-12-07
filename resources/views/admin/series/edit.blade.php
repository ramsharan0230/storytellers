@extends('admin.layouts.app')
@section('page_title', 'Edit Guest')
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

@section('content')


<div class="page-content fade-in-up">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox">
        <div class="ibox-head">
          <div class="ibox-title">Edit Guest</div>

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
          <form method="post" action="{{route('series.update', $detail->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" value="{{$detail->name}}"
                    placeholder="Enter full name">
                </div>

                <div class="form-group">
                  <label>Event</label>
                  <select name="event_id" class="form-control">
                    @foreach ($events as $item)
                      <option value="{{ $item->id }}" {{ $item->id == $detail->event_id ? 'selected' : '' }}>{{ $item->title }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="check-list">
                  <label class="ui-checkbox ui-checkbox-primary">
                    <input name="publish" type="checkbox" {{ $detail->publish == 1 ? 'checked': ''}}>
                    <span class="input-span"></span>Publish</label>
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
<script type="text/javascript">
  $('body').on('click', '.remove',function(e){
         e.preventDefault();
         // console.log('ada');
         var datas = $(this).data("image_id");
         // var exam_id = $(this).data('exam_token');
             Swal.fire({
                 title: 'Are you sure you want to delete this Image?',
                 type: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes!'
             }).then((result) => {
             if (result.value) {
               $.ajax({
                  method: 'post',
                  url: "{{route('event.index')}}",
                  data: {datas:datas},

                  success:function(data){
                    // var removeSection = #dami + datas;
                    // console.log(removeSection);
                    ajaxSuccess();
                    $("#remove-section"+datas).replaceWith($("#remove-section"+datas).next());
                    // $(removeSection).remove();
                      }
               });

             }
         })
     })

     function ajaxSuccess(){
            Swal.fire({
                type: 'success',
                title: 'Deleted!!!',
                html: '<div class="error_message">Image Deleted Successfully.</div>' ,
                confirmButtonText: 'Close',
                timer: 10000,
                position: 'top-end',
                animation: false,
                customClass: {
                    popup: 'animated fadeInDown'
                }
            });
        }

</script>

@endpush