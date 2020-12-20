@extends('admin.layouts.app')
@section('page_title', $event_title)

@push('styles')
<link href="{{asset('/assets/admin/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />

<style media="screen">
    .adjust-delete-button {
        margin-top: -28px;
        margin-left: 37px;
    }
</style>
@endpush
@section('content')

<div class="page-heading">
    <h1 class="page-title">{{ $event_title }}</h1>
    @include('admin.layouts._partials.messages.info')

</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Event Galleries</div>
            <div>
                @if(count($eventGallery)>0)
                    <a class="btn btn-info btn-md" href="{{route('event.addgallery', $eventGallery[0]->event_id)}}">Add Image</a>
                @endif
            </div>
        </div>

        <div class="ibox-body">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @if($eventGallery->count())
                    @foreach($eventGallery as $key => $data)
                    <tr>
                        <td>{{++$key}}</td>
                        <td><img src="{{ asset('images/event/gallery/'.$data->file_name)}}" class="img-thumbnail" alt="" srcset=""></td>
                        <td>{{$data->publish==0?"Not Published":"Published"}}</td>
                        <td>
                            <form class="adjust-delete-button mt-2" action="{{route('event.gallery.image.destroy', $data->id)}}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit" name="button"
                                    style="border-radius:50%"
                                    onclick="return confirm('Are you sure you want to delete this event?')"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8">
                            You do not have any data yet.
                        </td>
                    </tr>
                    @endif
                </tbody>

            </table>
        </div>
    </div>

</div>

@endsection
@push('scripts')
<script src="{{asset('/assets/admin/vendors/DataTables/datatables.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
    });
    $(function() {
        $('#example-table').DataTable({
            pageLength: 25,

        });
    })

    function makeSlider(id){
        var id = id;
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:'POST',
            url:'/admin/event/make-slider',
            data:{event_id: id, _token: _token},
            success:function(response){
                alert(response.message);
            }
        });
    }

    function makeFeatured(id){
        var id = id;
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:'POST',
            url:'/admin/event/make-featured',
            data:{event_id: id, _token: _token},
            success:function(response){
                alert(response.message);
            }
        });
    }
</script>
@endpush