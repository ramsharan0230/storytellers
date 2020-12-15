@extends('admin.layouts.app')
@section('page_title', 'All Bookings')

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
    <h1 class="page-title">Bookings</h1>
    @include('admin.layouts._partials.messages.info')
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Bookings</div>
        </div>
        <div class="ibox-body">
            <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Person Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Event</th>
                        <th>Booked Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>

                    @if($details->count())
                    @foreach($details as $key => $data)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->event->title }}</td>
                        <td>
                            @if($data->isBooked==1)
                                <button class="btn btn-sm btn-success">Booked</button>
                            @else
                                <button class="btn btn-sm btn-warning">Not Booked</button>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('bookings.edit', $data->id)}}" class="btn btn-success btn-sm mb-2"><i
                                    class="fa fa-edit"></i>
                            </a>
                            @if($data->isBooked == 0)
                            <form method="post" action="{{route('booking.conform', $data->id)}}">
                                @csrf
                                @method('post')
                                <input name="isBooked" type="hidden" value="1">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Confirm Booking
                                </button>
                            </form>
                            @else
                            <form method="post" action="{{route('booking.deny', $data->id)}}">
                                @csrf
                                @method('post')
                                <input name="isBooked" type="hidden" value="1">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Deny Booking
                                </button>
                            </form>
                            @endif
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