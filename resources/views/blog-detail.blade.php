@extends('layouts.master')

@section('title', $blog->title)
@push('styles')
    <x-embed-styles />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/inner.css') }}">
@endpush
@section('content')
@include('includes.header')
{{-- @include('includes.main-slider') --}}
    <!-- main slider section starts -->

<section class="main-slider">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="#" class="slider-image-side">
                    <img src="{{ asset('images/banners/').'/'.$blog->image }}" alt="slider-image">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- main slider section ends -->

<!-- blog section starts -->
<section  class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8  col-12">
                <h1 class="featured-name">{{ $blog->title }}</h1>
                <p class="mt-2">{{ $blog->created_at }}</p>
                <div class="details">
                    <p>
                        {{ $blog->short_description }}
                    </p>
                    <p>
                        {{ $blog->description }}
                    </p>
                </div>
            </div>
            <div class="col-lg-4  col-12">
                <div class="clip-list">
                    @forelse ($relatedBlogs as $blog)
                    <div class="clip-box mt-5">
                        <div class="overlay-box"></div>
                        <span class="featured-icon"><img src="{{ asset('images/icon_arrrow-right_2-u4551-fr.png') }}" id="hidden-on-hover" alt="icon"><img src="{{ asset('images/icon_arrrow-right_2-2.png') }}" id="display-on-hover" alt="icon"></span>
                        <p>{{ $blog->title }}</p>
                    </div>
                    <div class="clip-box mt-5">
                    @empty
                        No Related Blog Found!
                    @endforelse
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- blog section ends -->

<!-- featured recent section starts -->


<section class="featured-section bdr-line mt-5">
    <div class="container">
        <ul class="nav nav-tabs featured-tabs">
            <li><a class="active" data-toggle="tab" href="#featured">Featured</a></li>
            <li><a data-toggle="tab" href="#recent">Recent</a></li>
        </ul>

        <div class="tab-content featured-content">
            <div id="featured" class="tab-pane fade in active">
               <div class="row front-tab-wrapper">
                   @forelse ($featuredEvents as $featuredEvent)
                    <div class="col-lg-4 col-md-6 col-6 col-wrapp">
                        <div class="featured-card">
                            <a href="{{ route('event-detail', $featuredEvent->slug) }}" class="feature-image">
                                <img src="{{ asset('images/banners').'/'.$featuredEvent->banner_image }}" alt="image"><span class="feature-time">29:30</span>
                            </a>
                            <a href="{{ route('event-detail', $featuredEvent->slug) }}" class="featured-title-wrapp">
                                <span class="featured-icon"><img src="{{ asset('images/icon_arrrow-right_2-u4551-fr.png') }}" id="hidden-on-hover" alt="icon"><img src="{{ asset('images/icon_arrrow-right_2-2.png') }}" id="display-on-hover" alt="icon"></span>
                                <div class="featured-title-side">
                                    <h3>{{ $featuredEvent->title }}</h3>
                                    <p class="featured-name">{{ $featuredEvent->guest->name }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                   @empty
                       
                   @endforelse
               </div>
               <span class="video-btn-wrapper"><a href="{{ route('video-list') }}" class="more-btn btn">More Videos</a></span>
            </div>
            <div id="recent" class="tab-pane fade">
                <div class="row front-tab-wrapper">
                   @forelse ($recentEvents as $recentEvent)
                   <div class="col-lg-4 col-md-6 col-6 col-wrapp">
                        <div class="featured-card">
                            <a href="{{ route('event-detail', $recentEvent->slug) }}" class="feature-image">
                                <img src="{{ asset('images/banners').'/'.$recentEvent->banner_image }}" alt="image"><span class="feature-time">29:30</span>
                            </a>
                            <a href="{{ route('event-detail', $recentEvent->slug) }}" class="featured-title-wrapp">
                                <span class="featured-icon"><img src="{{ asset('images/icon_arrrow-right_2-u4551-fr.png') }}" id="hidden-on-hover" alt="icon"><img src="{{ asset('images/icon_arrrow-right_2-2.png') }}" id="display-on-hover" alt="icon"></span>
                                <div class="featured-title-side">
                                    <h3>{{ $recentEvent->title }}</h3>
                                    <p class="featured-name">{{ $recentEvent->guest->name }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                   @empty
                       No Recent Found!!
                   @endforelse
               </div>
               <span class="video-btn-wrapper"><a href="{{ route('video-list') }}" class="more-btn btn">More Videos</a></span>
            </div>
        </div>
    </div>
</section>

<!-- featured recent section ends -->

<!-- events section starts -->

<section class="events-section all-sec-padding">
    <div class="container">
        @forelse ($upcomingEvents as $upcomingEvent)
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <a href="{{ route('bookings') }}" class="about-title-side event-title"><h2>Upcoming <br> events</h2></a>
                    <a href="{{ route('bookings') }}" class="read-more-btn btn">Book your ticket</a>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="event-slider">
                        <div class="image-wrapper">
                            <a href="{{ route('bookings') }}" class="event-slider-image"><img src="{{ asset('images/upcoming').'/'.$upcomingEvent->banner_image }}" alt="image"></a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="row">
                <h2>No Upcoming Event!!</h2>
            </div>
        @endforelse
    </div>
</section>

<!-- event section ends -->

    @include('includes.social_media')

    <!-- social media section ends -->
    <!-- footer section starts -->

@include('includes.footer')


@stop