@extends('admin.layouts.app')

@section('page_title', 'Dashboard')
@push('styles')
<style>
    .form-group label {
        text-transform: capitalize;
    }
</style>
@endpush

@section('content')
<div class="page-heading">
    <h1 class="page-title">Dashboard</h1>
</div>
<div class="page-content fade-in-up">
    {{-- Cards --}}
    <div class="row">
        {{-- Category --}}
        <div class="col-lg-3 col-md-6">
            {{-- <a href="{{route('category.index')}}" class="text-white"> --}}
            <a href="#" class="text-white">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"> {{ $total_users }}</h2>
                        <div class="m-b-5 text-uppercase">total users</div>
                        <i class="fa fa-gift widget-stat-icon"></i>
                        <div>
                            <a href="{{ route('users.index') }}" style="color:white"><small>View More</small><i class="fa fa-arrow-circle-o-right m-l-5"></i></a>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- Exhibitor --}}
        <div class="col-lg-3 col-md-6">
            {{-- <a href="{{route('exhibitor.index')}}" class="text-white"> --}}
                <a href="#" class="text-white">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"> {{ $total_guests }}</h2>
                        <div class="m-b-5 text-uppercase">total guests</div>
                        <i class="fa fa-table widget-stat-icon"></i>
                        <div>
                            
                            <a href="{{ route('guest.index') }}" style="color:white"><small>View More</small><i class="fa fa-arrow-circle-o-right m-l-5"></i></a>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- Scholarship --}}
        <div class="col-lg-3 col-md-6">
            <a href="#" class="text-white">
                <div class="ibox bg-orange color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"> {{ $total_events}}</h2>
                        <div class="m-b-5 text-uppercase">total events</div>
                        <i class="fa fa-graduation-cap widget-stat-icon"></i>
                        <div>
                            <a href="{{ route('event.index') }}" style="color:white"><small>View More</small><i class="fa fa-arrow-circle-o-right m-l-5"></i></a>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- Institution --}}
        <div class="col-lg-3 col-md-6">
            <a href="#" class="text-white">
                <div class="ibox bg-blue color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"> {{ $total_series }}</h2>
                        <div class="m-b-5 text-uppercase">total series</div>
                        <i class="fa fa-university widget-stat-icon"></i>
                        <div>
                            
                            <a href="{{ route('series.index') }}" style="color:white"><small>View More</small><i class="fa fa-arrow-circle-o-right m-l-5"></i></a>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Events</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Title</th>
                                <th>banner_image</th>
                                <th>datetime</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dashboard_allevents as $key => $event)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$event->title}}</td>
                                <td><img width="100px" height="50px" src="{{ asset('images/banners/'.$event->banner_image) }}" alt="" srcset=""></td>
                                <td>{{$event->datetime}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">New Guests</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Org.</th>
                                <th>Photo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dashboard_allguests as $key => $guest)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ $guest->name }}</td>
                                <td>{{ $guest->designation }}</td>
                                <td>{{ $guest->organization }}</td>
                                <td><img src="{{ asset('images/thumbnail/'.$guest->photo) }}" height="50" width="50" alt="" srcset=""></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

@endpush