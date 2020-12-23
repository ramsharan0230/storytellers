@extends('layouts.master')

@section('title', 'Video List')
@push('styles')
    <x-embed-styles />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/inner.css') }}">
@endpush

@section('content')
@include('includes.header')

<section class="video-list-page">
    <div class="container">
        <div class="innerpage-video-wrapp video-list-wrapper">
            @forelse ($recentEvents as $key => $recentEvent)
                @if($key == 0)
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$recentEvent->youtubeVideo($recentEvent->video_link)}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            
                <a href="{{ route('event-detail', $recentEvent->slug) }}" class="featured-title-side video-list-title">
                    <span class="featured-name video-name video-list-name">Mr. Anil Chitrakar</span>
                    <p>{{ $recentEvent->guest->name }}, {{ $recentEvent->guest->organization }}</p>
                </a>
                @endif
            @empty
            <p>No Event Found</p>
            @endforelse
            
        </div>
        <div class="video-list-wrapp">
            @forelse ($recentEvents as $key => $event)
                @if($key==0)
                    @continue
                @else
                <div class="video-block">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$event->youtubeVideo($event->video_link)}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            
                    <a href="{{ route('event-detail', $event->slug) }}" class="featured-title-side video-list-title">
                        <span class="featured-name video-name video-list-name">{{ $event->guest->name }}</span>
                        <p>{{ $event->guest->designation }}, {{ $event->guest->organization }}</p>
                    </a>
                </div>
                @endif
            @empty
                <div class="video-block">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/wGqJFtxWoqM)}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            
                    <a href="#" class="featured-title-side video-list-title">
                        <span class="featured-name video-name video-list-name"></span>
                        <p>No New Event Found!!!</p>
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</section>
@include('includes.upcoming-events')

<!-- event section ends -->

    <!-- social media section starts -->

@include('includes.social_media')

    <!-- social media section ends -->
    <!-- footer section starts -->

@include('includes.footer')


@stop
