@extends('layouts.master')

@section('title', 'Featured Video List')
@push('styles')
    <x-embed-styles />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/inner.css') }}">
@endpush

@section('content')
@include('includes.header')

<section class="video-list-page">
    <div class="container">
        <div class="innerpage-video-wrapp video-list-wrapper">
            @forelse ($events as $key => $featureEvent)
                @if($key == 0)
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$featureEvent->youtubeVideo($featureEvent->video_link)}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            
                <a href="#" class="featured-title-side video-list-title">
                    <span class="featured-name video-name video-list-name">{{ $featureEvent->series->name }}</span>
                    <p>{{ $featureEvent->guest->name }}, {{ $featureEvent->guest->organization }}</p>
                </a>
                @endif
            @empty
            <p>No Event Found</p>
            @endforelse
            
        </div>
        <div class="video-list-wrapp">
            @forelse ($events as $key => $event)
                <div class="video-block">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$event->youtubeVideo($event->video_link)}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            
                    <a href="#" class="featured-title-side video-list-title">
                        <span class="featured-name video-name video-list-name">{{ $event->guest->name }}</span>
                        <p>{{ $event->guest->designation }}, {{ $event->guest->organization }}</p>
                    </a>
                </div>
            @empty
                
            @endforelse
        </div>
    </div>
</section>

<section class="events-section all-sec-padding">
    <div class="container">
        
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <a href="{{ route('bookings') }}" class="about-title-side event-title"><h2>Upcoming <br> events</h2></a>
                    <a href="{{ route('bookings') }}" class="read-more-btn btn">Book your ticket</a>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="event-slider">
                        @forelse ($upcomingEvents as $upcomingEvent)
                        <div class="image-wrapper">
                            <a href="{{ route('bookings') }}" class="event-slider-image"><img src="{{ asset('images/upcoming').'/'.$upcomingEvent->banner_image }}" alt="image"></a>
                        </div>
                        @empty
                            <div class="row">
                                <h2>No Upcoming Event!!</h2>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
    </div>
</section>
<!-- event section ends -->

    <!-- social media section starts -->

@include('includes.social_media')

    <!-- social media section ends -->
    <!-- footer section starts -->

@include('includes.footer')


@stop
