@extends('admin.layouts.app')
@section('page_title', 'All Guests')

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
    <h1 class="page-title">Guests</h1>
    @include('admin.layouts._partials.messages.info')
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All guests</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('guest.create')}}">Add Guest</a>
            </div>
        </div>


        <div class="ibox-body">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Designation</th>
                        <th>Organization</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>

                    @if($details->count())
                    @foreach($details as $key => $data)

                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->designation}}</td>
                        <td>{{$data->organization}}</td>
                        <td><img src="{{ asset('images/main/'.$data->photo)}}" alt="" width="100px" height="50px"></td>
                        <td>{{$data->publish == 1 ? 'Published' : 'Not Published'}}</td>
                        <td>
                            <a href="{{route('guest.edit', $data->id)}}" class="btn btn-success btn-sm"><i
                                    class="fa fa-edit"></i>
                            </a>
                            <form class="adjust-delete-button" action="{{route('guest.delete', $data->id)}}" method="post">
                                @csrf
                                @method('post')
                                <button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%" onclick="return confirm('Are you sure you want to delete this Gallery?')"><i class="fa fa-trash"></i></button>
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
    $(function() {
        $('#example-table').DataTable({
            pageLength: 25,

        });
    })
</script>
@endpush

{{-- <td><a href="/images/main/{{$data->image}}" target="_blank"><img style="height:120px; width: 120px;"
    src="{{$data->image ? asset('/images/thumbnail/' . $data->image) : '/assets/admin/images/image.jpg' }}"></a>
</td> --}}

{{-- <form class="adjust-delete-button" action="{{route('category.destroy', $data->id)}}"
method="post">
@csrf
@method('delete')
<button class="btn btn-danger btn-sm" type="submit" name="button" style="border-radius:50%"
    onclick="return confirm('Are you sure you want to delete this category?')"><i class="fa fa-trash"></i></button>
</form> --}}