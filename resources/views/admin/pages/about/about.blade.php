@extends('admin.layouts.app')
@section('page_title', 'About us')
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
    <h1 class="page-title">Pages</h1>
    <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href=""><i class="la la-home font-20"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item"> All News</li>
    </ol> -->
    @include('admin.layouts._partials.messages.info')
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">About Page</div>
            <div>
                @if(!$data)
                <a class="btn btn-info btn-md" href="{{route('pages.about.create')}}">Add Pages</a>
                @endif
            </div>
        </div>


        <div class="ibox-body">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Highlight Text</th>
                        <th>First Paragraph</th>
                        <th>Second Paragraph</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data)
                    <tr>
                        <td>{{$data->title}}</td>
                        <td><img src="{{ asset('images/about').'/'.$data->about_logo }}" alt="" width="100px" height="50px"></td>
                        <td>{{$data->highlight_text}}</td>
                        <td>{{ $data->first_paragraph }}</td>
                        <td>{{ $data->second_paragraph }}</td>
                        <td>{{ $data->description }}</td>
                        <td><img src="{{ asset('images/about').'/'.$data->image }}" alt="" width="100px" height="50px"></td>
                        <td>{{$data->publish == 1 ? 'Published' : 'Not Published'}}</td>
                        <td>
                            <a href="{{route('pages.about.edit', $data->id)}}" class="btn btn-success btn-sm"><i
                                    class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="7">No About Found!</td>
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