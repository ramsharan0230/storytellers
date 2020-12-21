@extends('layouts.master')

@section('title', 'About Us')
@push('styles')
    <x-embed-styles />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/inner.css') }}">
@endpush
@section('content')
@include('includes.header')


<!-- featured recent section starts -->
<section class="about-page">
    <div class="container">
        <div class="about-image">
            <img src="{{ asset('images/about').'/'.$about->about_logo }}" width="" alt="image">
        </div>
        @if($about != null)
        <div class="about-inner-wrapper">
            <div class="about-inner-title">
                <h2>{{ $about->highlight_text }}.</h2>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner-content-side">
                        <p>{{ $about->first_paragraph }}</p>
                        <p>{{ $about->second_paragraph }}</p>
                        <p>{{ $about->description }}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner-image">
                        <img src="{{ asset('images/about').'/'.$about->image }}" alt="image" width="100%" height="50%">
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="about-inner-wrapper">
            <div class="about-inner-title">
                <h2>No About Found!</h2>
            </div>
        </div>
        @endif
    </div>
</section>

<section class="events-section all-sec-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <a href="#" class="about-title-side event-title"><h2>Upcoming <br> events</h2></a>
                <a href="#" class="read-more-btn btn">Book your ticket</a>
            </div>
            <div class="col-lg-8">
                <div class="event-slider">
                    @forelse ($upcomingEvents as $upcomingEvent)
                        <div class="image-wrapper">
                            <a href="#" class="event-slider-image"><img width="100%" height="100%" src="{{ asset('images/upcoming').'/'.$upcomingEvent->banner_image }}" alt="image"></a>
                        </div>
                    @empty
                        <div class="image-wrapper">
                            <a href="#" class="event-slider-image">No Upcoming Event Found!!!</a>
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
