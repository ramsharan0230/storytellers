@extends('admin.layouts.app')
@section('page_title', 'All scholarships/institutions')

    @push('styles')
        <link href="{{ asset('/assets/admin/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />

        <style media="screen">
            .adjust-delete-button {
                margin-top: -28px;
                margin-left: 37px;
            }

        </style>
    @endpush
@section('content')

    <div class="page-heading">
        <h1 class="page-title">Scholarships/institutions</h1>
        @include('admin.layouts._partials.messages.info')

    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">All scholarships/institutions</div>
                <div>
                    <a class="btn btn-info btn-md" href="{{ route('admin.scholarship.create', $detail->id) }}">Add
                        scholarship/institution</a>
                </div>
            </div>


            <div class="ibox-body">
                <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>Exhibitor's Name</th>
                            <th>Scholarship Available</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($detail)
                            @foreach ($detail->scholarships as $key => $data)
                                <tr>
                                    <td>{{ $detail->title }}</td>
                                    <td>{{ $data->percent ? $data->percent . '%' : 'N/A' }}</td>
                                    <td>Scholarship</td>
                                    <td>{{ $data->publish == 1 ? 'Published' : 'Not Published' }}</td>
                                    <td>
                                        <a href="{{ route('admin.scholarship.edit', [$detail->id, $data->id]) }}"
                                            class="btn btn-success btn-sm"><i class="fa fa-edit"></i>
                                        </a>
                                        <form class="mt-2"
                                            action="{{ route('admin.scholarship.delete', [$detail->id, $data->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit" name="button"
                                                style="border-radius:50%"
                                                onclick="return confirm('Are you sure you want to delete this scholarship?')"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($detail->institutions as $key => $data)
                                <tr>
                                    <td>{{ $detail->title }}</td>
                                    <td>N/A</td>
                                    <td>Institution</td>
                                    <td>{{ $data->publish == 1 ? 'Published' : 'Not Published' }}</td>
                                    <td>
                                        <a href="{{ route('admin.scholarship.edit', [$detail->id, $data->id]) }}"
                                            class="btn btn-success btn-sm"><i class="fa fa-edit"></i>
                                        </a>
                                        <form class="mt-2"
                                            action="{{ route('admin.scholarship.delete', [$detail->id, $data->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit" name="button"
                                                style="border-radius:50%"
                                                onclick="return confirm('Are you sure you want to delete this scholarship?')"><i
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
