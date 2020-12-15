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
        <div class="about-inner-wrapper">
            <div class="about-inner-title">
                <h2>We surround ourselves with walls. We build them piece by piece, brick by brick. Stories punch holes over them, doing the unexpected. The walls come down again, one story after another.</h2>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner-content-side">
                        <p>Stories are as old as human history, perhaps even older as we have told stories about times when we did not yet exist. Stories began as a way to remember important, lifesaving events. Stories are what have kept us alive throughout these ages; stories are what we remember.</p>
                        <p>This magic of stories is what is relieved at The Storytellers, bringing stories from the corners of Nepal, about the local heroes with the local circumstances. Nepal, home to sky piercing mountains and welcoming hands, holds stories that will make you laugh, wonder and question. We believe that stories have the power to inspire and change. It is for this split second of inspiration that we strive endlessly.</p>
                        <p>Our vision to inspire change is realized through series of events with focus on a specific category, exploring stories under this category. Till date we have been successful in carrying out nine series- Startup Series, Social Change maker Series, Educators’ Series, Music Series I, Music Series II, Pioneer Series I, Conservation Series, Pioneer Series II, Music Series exclusive with Night where over 20 story makers from these diverse fields have shared their inspiring stories with us.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner-image">
                        <img src="images/about-us_team.jpg" alt="image">
                    </div>
                </div>
            </div>
        </div>
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
                    @forelse ($allEvents as $item)
                        <div class="image-wrapper">
                            <a href="{{ route('event-detail', $item->slug) }}" class="event-slider-image"><img width="100%" height="100%" src="{{ asset('images/banners').'/'.$item->banner_image }}" alt="image"></a>
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
