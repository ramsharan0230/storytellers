@extends('admin.layouts.app')
@section('page_title', 'All Events')

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
    <h1 class="page-title">All events</h1>
    @include('admin.layouts._partials.messages.info')

</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All event</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('event.create')}}">Add event</a>
            </div>
        </div>


        <div class="ibox-body">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Guest</th>
                        <th>Series</th>
                        <th>Highlight Text</th>
                        <th>Banner Image</th>
                        <th>Slider</th>
                        <th>Featured</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @if($details->count())
                    @foreach($details as $key => $data)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{ucfirst($data->title)}}</td>
                        <td>{{$data->guest->name}}</td>
                        <td>{{ $data->series->name }}</td>
                        <td>{!! $data->highlight_text !!}</td>
                        <td><img src="{{ asset('images/banners/'.$data->banner_image)}}" width="100px" height="50px" alt="" srcset=""></td>
                        <td>
                            <div class="check-list">
                            <label class="ui-checkbox ui-checkbox-primary">
                              <input name="publish" type="checkbox" onclick="makeSlider({{ $data->id }})" {{ $data->slider == 1 ? 'checked': ''}}>
                              <span class="input-span"></span>Make Slider</label>
                            </div>
                        </td>
                        <td>
                            <div class="check-list">
                            <label class="ui-checkbox ui-checkbox-primary">
                              <input name="featured" type="checkbox" onclick="makeFeatured({{ $data->id }})" {{ $data->video_type == 'featured' ? 'checked': ''}}>
                              <span class="input-span"></span>Make Featured</label>
                            </div>
                        </td>
                        <td>{{$data->publish==1?"Published":"Not Published" }}</td>
                        <td>
                            <a href="{{route('event.edit', $data->id)}}" class="btn btn-success btn-sm"><i
                                    class="fa fa-edit"></i></a>

                            <form class="adjust-delete-button" action="{{route('event.destroy', $data->id)}}"
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