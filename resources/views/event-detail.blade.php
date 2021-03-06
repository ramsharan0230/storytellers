@extends('layouts.master')

@section('title', $event->title)
@push('styles')
    <x-embed-styles />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/inner.css') }}">
@endpush
@section('content')
@include('includes.header')
{{-- @include('includes.main-slider') --}}

    <section class="innerpage-section">
        <div class="container">
            <div class="innerpage-video-wrapp">
                <iframe width="400px" src="https://www.youtube.com/embed/{{$event->youtubeVideo($event->video_link)}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="innerpage-tab-section">
                        <ul class="nav nav-tabs featured-tabs innerpage-tabs">
                            <li><a class="active" data-toggle="tab" href="#detail">Detail</a></li>
                            <li><a data-toggle="tab" href="#storyteller">storyteller</a></li>
                        </ul>

                        <div class="tab-content featured-content innerpage-content">
                            <div id="detail" class="tab-pane fade in active">
                                <div class="innerpage-detail">
                                    <span>{{ $event->guest->name }}, {{ $event->guest->designation }}, {{ $event->guest->organization }}</span>
                                    <h2>{{ $event->title }}</h2>
                                    <p>{{ $event->first_patagraph }}</p>
                                    <p>{{ $event->second_patagraph }}</p>
                                </div>
                                <div class="innerother-detail">
                                    <h3>{{ $event->highlight_text }}</h3>
                                    <p>{{ $event->descriptions }}</p>
                                </div>
                            </div>
                            <div id="storyteller" class="tab-pane fade">
                                <div class="storyteller-section">
                                    <div class="story-image-side"><span><img src="{{ asset('images/thumbnail').'/'.$event->guest->photo }}" alt="image"></span></div>
                                    <div class="story-content-side">
                                        <p>{{ $event->guest->description }}</p>
                                    </div>
                                </div>
                                <div class="story-image-section">
                                        @forelse ($event->eventgalleries as $gallery)
                                        <img src="{{ asset('images/event/gallery').'/'.$gallery->file_name }}">
                                        @empty
                                        
                                        @endforelse
                                </div>
                            </div>
                        </div>
                        
                    </div>  
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="innerpage-sidebar">
                        <h2>Similar Videos</h2>
                        @forelse ($similerVideos as $similer_video)
                            <div class="featured-card">
                                <a href="{{ route('event-detail', $similer_video->slug) }}" class="feature-image">
                                    <iframe src="https://www.youtube.com/embed/{{$event->youtubeVideo($similer_video->video_link)}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </a>
                                <a href="{{ route('event-detail', $similer_video->slug) }}" class="featured-title-wrapp">
                                    <div class="featured-title-side">
                                        <h3>{{ $similer_video->title }}</h3>
                                        <p class="featured-name">{{ $similer_video->guest->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @empty

                        <div class="featured-card">
                            <a href="#" class="featured-title-wrapp">
                                <div class="featured-title-side">
                                    <h3>No Video Found</h3>
                                </div>
                            </a>
                        </div>
                            
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        @if($featuredVideo !==null)
        <div class="inner-video-section">
            <div class="container">
                <div class="about-title-side innerpage-title">
                    <a href="{{ route('event-detail', $featuredVideo->slug) }}"><h2><span>Watch:</span> {{ $featuredVideo->title }}.</h2></a>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="inner-video-sec">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$event->youtubeVideo($featuredVideo->video_link)}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="inner-video-content">
                            <a href="{{ route('event-detail', $featuredVideo->slug) }}" class="featured-title-wrapp video-sec-title">
                                <span class="featured-icon"><img src="{{ asset('images/icon_arrrow-right_2-u4551-fr.png') }}" id="hidden-on-hover" alt="icon"><img src="{{ asset('images/icon_arrrow-right_2-2.png') }}" id="display-on-hover" alt="icon"></span>
                                <div class="featured-title-side">
                                    <span class="featured-name video-name">{{ $featuredVideo->guest->name }}, {{ $featuredVideo->guest->designation }}, {{ $featuredVideo->guest->organization }}</span>
                                </div>
                            </a>
                            <p>{{ $featuredVideo->guest->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="inner-block-section all-sec-padding">
            <div class="container">
                @if(count($blogs)>=3)
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-12">
                        <a href="{{ route('blog-detail', $blogs[0]->slug) }}" class="block-left-side">
                            <div class="slider-btn block-btn btn " tabindex="0">
                                <img src="{{ asset('images/icon_arrrow right-1.png') }}" id="hide-in-hover" alt="icon">
                                <img src="{{ asset('images/icon_arrrow right-2.png') }}" id="display-in-hover" alt="icon">
                            </div>
                            <div class="block-content">
                                <div class="about-title-side">
                                    <h2>{{ $blogs[0]->title }}</h2>
                                    @if(strlen($blogs[0]->short_description) > 100)
                                        <p>{{substr($blogs[0]->short_description,0,100)}}</p>
                                    @else
                                        <p>{{$blogs[0]->short_description}}</p>
                                    @endif
                                    ....
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('blog-detail', $blogs[1]->slug) }}" class="block-left-side block-left-second">
                            <div class="slider-btn block-btn btn " tabindex="0">
                                <img src="{{ asset('images/icon_arrrow right-1.png') }}" id="hide-in-hover" alt="icon">
                                <img src="{{ asset('images/icon_arrrow right-2.png') }}" id="display-in-hover" alt="icon">
                            </div>
                            <div class="block-content block-second-content">
                                <div class="about-title-side ">
                                    <h2>{{ $blogs[1]->title }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-5 col-12">
                        <a href="{{ route('blog-detail', $blogs[2]->slug) }}" class="block-left-side block-right-side">
                            <div class="block-content">
                                <div class="about-title-side">
                                    <h2>{{ $blogs[2]->title }}</h2>
                                    <img src="{{ asset('images/banners').'/'.$blogs[2]->image }}" class="block-right-image" alt="image">
                                    @if(strlen($blogs[2]->short_description) > 100)
                                        <p>{{substr($blogs[2]->short_description,0,100)}}</p>
                                    @else
                                        <p>{{$blogs[2]->short_description}}</p>
                                    @endif
                                    ....
                                </div>
                            </div>
                            <div href="{{ route('blog-detail', $blogs[2]->slug) }}" class="slider-btn block-btn btn " tabindex="0">
                                <img src="{{ asset('images/icon_arrrow right-1.png') }}" id="hide-in-hover" alt="icon">
                                <img src="{{ asset('images/icon_arrrow right-2.png') }}" id="display-in-hover" alt="icon">
                            </div>
                        </a>
                    </div>
                </div>
                @endif
                @if(count($blogs)>=5)
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-12">
                        <a href="{{ route('blog-detail', $blogs[3]->slug) }}" class="block-left-side block-right-side second-row">
                            <div class="block-content second-row-content">
                                <div class="about-title-side second-row-title">
                                    <img width="100%" src="{{ asset('images/banners').'/'.$blogs[3]->image }}" class="block-right-image" alt="image">
                                    <h2>{{ $blogs[3]->title }}</h2>
                                </div>
                            </div>
                            <div class="slider-btn block-btn btn " tabindex="0">
                                <img src="{{ asset('images/icon_arrrow right-1.png') }}" id="hide-in-hover" alt="icon">
                                <img src="{{ asset('images/icon_arrrow right-2.png') }}" id="display-in-hover" alt="icon">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-7 col-md-7 col-12">
                        <a href="{{ route('blog-detail', $blogs[4]->slug) }}" class="block-left-side">
                            <div class="slider-btn block-btn btn " tabindex="0">
                                <img src="{{ asset('images/icon_arrrow right-1.png') }}" id="hide-in-hover" alt="icon">
                                <img src="{{ asset('images/icon_arrrow right-2.png') }}" id="display-in-hover" alt="icon">
                            </div>
                            <div class="block-content">
                                <div class="about-title-side">
                                    <h2>{{ $blogs[4]->title }}</h2>
                                    
                                    @if(strlen($blogs[4]->short_description) > 300)
                                        <p>{{substr($blogs[4]->short_description,0,300)}}</p>
                                    @else
                                        <p>{{$blogs[4]->short_description}}</p>
                                    @endif
                                    ....
                                </div>
                            </div>
                        </a>
                        <span class="read-btn-wrapp" style="margin-right: 0"><a href="{{ route('blogs') }}" class="read-more-btn btn">Read More Stories</a></span>
                    </div>
                </div>
                @endif
            </div>
        </div>
        
        <div class="inner-event-section all-sec-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <a href="{{ route('bookings') }}" class="about-title-side event-title"><h2>Upcoming <br> events</h2></a>
                        <a href="{{ route('bookings') }}" class="read-more-btn btn">Book your ticket</a>
                    </div>
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="event-slider">
                            @forelse ($upcomingEvents as $upcomingtEvent)
                                <div class="image-wrapper">
                                    <a href="{{ route('bookings') }}" class="event-slider-image"><img src="{{ asset('images/upcoming').'/'.$upcomingtEvent->banner_image }}" alt="image"></a>
                                </div>
                            @empty
                                <h2>No Upcoming Event!</h2>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.social_media')

    <!-- social media section ends -->
    <!-- footer section starts -->

@include('includes.footer')


@stop