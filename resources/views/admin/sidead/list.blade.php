@extends('admin.layouts.app')

@push('styles')
    <link href="{{ asset('/assets/admin/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />

    <style media="screen">
        .adjust-delete-button {
            margin-top: -28px;
            margin-left: 37px;
        }

    </style>
@endpush
@section('page_title', 'All sideads')

@section('content')

    <div class="page-heading">
        <h1 class="page-title">Sideads</h1>
        @include('admin.layouts._partials.messages.info')

    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">All sidead</div>
                <div>
                    <a class="btn btn-info btn-md" href="{{ route('sidead.create') }}">Add sidead</a>
                </div>
            </div>


            <div class="ibox-body">
                <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Exhibitor's Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($details->count())
                            @foreach ($details as $key => $data)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $data->exhibitor->title }}</td>
                                    <td>
                                        @if ($data->image)
                                            <img width="120" src="/images/thumbnail/{{ $data->image }}" alt="image">
                                        @endif
                                    </td>
                                    <td>{{ $data->publish == 1 ? 'Published' : 'Not Published' }}</td>
                                    <td>
                                        <a href="{{ route('sidead.edit', $data->id) }}" class="btn btn-success btn-sm"><i
                                                class="fa fa-edit"></i></a>
                                        <form class="mt-2" action="{{ route('sidead.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit" name="button"
                                                style="border-radius:50%"
                                                onclick="return confirm('Are you sure you want to delete this sidead?')"><i
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
    <script src="{{ asset('/assets/admin/vendors/DataTables/datatables.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 25,

            });
        })

    </script>
@endpush
