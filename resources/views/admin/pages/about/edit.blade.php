@extends('admin.layouts.app')
@section('page_title', 'Edit About us')
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
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" action="{{ route('pages.about.update', $about->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit About Page</div>

                        <div class="ibox-tools">

                        </div>
                    </div>

                    <div class="ibox-body" style="">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" name="title" value="{{ $about->title }}" type="text"
                                        placeholder="Enter Title">
                                </div>
        
                                <div class="form-group">
                                    <label>Highlight Text</label>
                                        <textarea name="highlight_text" class="form-control" rows="8"
                                        cols="80">{{ $about->highlight_text }}</textarea>
                                </div>
        
                                <div class="form-group">
                                    <label>First Paragraph</label>
                                    <textarea name="first_paragraph" class="form-control" rows="8"
                                        cols="80">{{$about->first_paragraph}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Second Paragraph</label>
                                    <textarea name="second_paragraph" class="form-control" rows="8"
                                        cols="80">{{$about->second_paragraph}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="8"
                                        cols="80">{{ $about->description }}</textarea>
                                </div>
        
                                <div class="check-list">
                                    <label class="ui-checkbox ui-checkbox-primary">
                                        <input name="publish" type="checkbox" {{$about->publish ? 'checked' : ''}}>
                                        <span class="input-span"></span>Publish</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Select Logo Image</label>
                                    <input type="file" id="fileUpload" class="form-control" name="about_logo">
                                    <div id="wrapper" class="mt-2">
                                        <div id="image-holder">
                                            @if($about->about_logo)
                                            <img src="{{asset('images/about/'. $about->about_logo)}}"
                                                style="margin-top:12px; margin-bottom:12px;" height="120px" width="200px"
                                                alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Select Banner Image</label>
                                    <input type="file" id="fileUpload" class="form-control" name="image">
                                    <div id="wrapper" class="mt-2">
                                        <div id="image-holder">
                                            @if($about->image)
                                            <img src="{{asset('images/about/'. $about->image)}}"
                                                style="margin-top:12px; margin-bottom:12px;" height="120px" width="120px"
                                                alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">Submit</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <pre id="output"></pre>
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
                  url: "#",
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