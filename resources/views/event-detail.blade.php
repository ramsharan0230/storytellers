@extends('layouts.master')

@section('title', 'Story Teller | {{ $event->title }}')
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
                <x-embed url="{{ $event->video_link }}" aspect-ratio="5:3" />
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
                                    <h2>{{ $event->highlight_text }}</h2>
                                    <p>{{ $event->guest->description }}</p>
                                </div>
                                <div class="innerother-detail">
                                    <h3>{{ $event->guest->feature_text }}</h3>
                                    <p>{{ $event->descriptions }}</p>
                                </div>
                            </div>
                            <div id="storyteller" class="tab-pane fade">
                                <div class="storyteller-section">
                                    <?php //dd($event->guest->photo) ?>
                                    <div class="story-image-side"><span><img src="{{ asset('images/thumbnail').'/'.$event->guest->photo }}" alt="image"></span></div>
                                    <div class="story-content-side">
                                        <p>{{ $event->guest->description }}</p>
                                    </div>
                                </div>
                                <div class="story-image-section">
                                    <img src="{{ asset('images/thumbnail').'/'.$event->guest->photo }}">
                                    <img src="{{ asset('images/thumbnail').'/'.$event->guest->photo }}">
                                    <img src="{{ asset('images/thumbnail').'/'.$event->guest->photo }}">
                                </div>
                            </div>
                        </div>
                        
                    </div>  
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="innerpage-sidebar">
                        <h2>Similar Videos</h2>
                        @forelse ($allEvents as $similer_video)
                            <div class="featured-card">
                                <a href="#" class="feature-image">
                                    <x-embed url="{{ $similer_video->video_link }}" aspect-ratio="4:3" />
                                </a>
                                <a href="#" class="featured-title-wrapp">
                                    <div class="featured-title-side">
                                        <h3>{{ $similer_video->title }}</h3>
                                        <p class="featured-name">{{ $similer_video->guest->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @empty
                            
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="inner-video-section">
            <div class="container">
                <div class="about-title-side innerpage-title">
                    <a href="#"><h2><span>Watch:</span> The Agony of an untold story unleashed.</h2></a>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="inner-video-sec">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/6dKhHv6WLbY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="inner-video-content">
                            <a href="#" class="featured-title-wrapp video-sec-title">
                                <span class="featured-icon"><img src="images/icon_arrrow-right_2-u4551-fr.png" id="hidden-on-hover" alt="icon"><img src="images/icon_arrrow-right_2-2.png" id="display-on-hover" alt="icon"></span>
                                <div class="featured-title-side">
                                    <span class="featured-name video-name">Ms. Mina Singh, Singer, Night Band</span>
                                </div>
                            </a>
                            <p>Meena Singh was born and raised in Nagaland, India. She was 8 years old when her family decided to move back to Nepal. Led by her grandfather, their return was unexpected and very sudden. They returned back to their roots, only to find all of their belongings had been snatched away by relatives. All their savings had dried up in an attempt to get back what was theirs. After two years, the family’s only breadwinner, Singh’s grandfather passed away leaving them with nothing to hold on to.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="inner-block-section all-sec-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-12">
                        <a href="#" class="block-left-side">
                            <div href="#" class="slider-btn block-btn btn " tabindex="0">
                                <img src="images/icon_arrrow right-1.png" id="hide-in-hover" alt="icon">
                                <img src="images/icon_arrrow right-2.png" id="display-in-hover" alt="icon">
                            </div>
                            <div class="block-content">
                                <div class="about-title-side">
                                    <h2>The 3 ‘E’s of Storytelling to craft an engaging story</h2>
                                    <p>When we share personal stories, they include events that have occurred some time in the past. It can be decades old or a fresh one. In some sense, stories, as you set out to craft them at first go, will be in some form of the past tense, because they have already have happened.  ...</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="block-left-side block-left-second">
                            <div href="#" class="slider-btn block-btn btn " tabindex="0">
                                <img src="images/icon_arrrow right-1.png" id="hide-in-hover" alt="icon">
                                <img src="images/icon_arrrow right-2.png" id="display-in-hover" alt="icon">
                            </div>
                            <div class="block-content block-second-content">
                                <div class="about-title-side ">
                                    <h2>The stories are recited by the story makers themselves and so these stories can not be more authentic.</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-5 col-12">
                        <a href="#" class="block-left-side block-right-side">
                            <div class="block-content">
                                <div class="about-title-side">
                                    <h2>4 Storytelling Essentials You Can’t Miss</h2>
                                    <img src="images/home_blog3_small.jpg" class="block-right-image" alt="image">
                                    <p>We gather stories from people from different fields of life, that can simply have an impact - be it personal, professional, social, or any other fields. We stand here with an effort of bringing in stories to you,</p>
                                </div>
                            </div>
                            <div href="#" class="slider-btn block-btn btn " tabindex="0">
                                <img src="images/icon_arrrow right-1.png" id="hide-in-hover" alt="icon">
                                <img src="images/icon_arrrow right-2.png" id="display-in-hover" alt="icon">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-12">
                        <a href="#" class="block-left-side block-right-side second-row">
                            <div class="block-content second-row-content">
                                <div class="about-title-side second-row-title">
                                    <img src="images/image.png" class="block-right-image" alt="image">
                                    <h2>10 secrets to write better stories</h2>
                                </div>
                            </div>
                            <div href="#" class="slider-btn block-btn btn " tabindex="0">
                                <img src="images/icon_arrrow right-1.png" id="hide-in-hover" alt="icon">
                                <img src="images/icon_arrrow right-2.png" id="display-in-hover" alt="icon">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-7 col-md-7 col-12">
                        <a href="#" class="block-left-side">
                            <div href="#" class="slider-btn block-btn btn " tabindex="0">
                                <img src="images/icon_arrrow right-1.png" id="hide-in-hover" alt="icon">
                                <img src="images/icon_arrrow right-2.png" id="display-in-hover" alt="icon">
                            </div>
                            <div class="block-content">
                                <div class="about-title-side">
                                    <h2>What is <br>storytelling</h2>
                                    <p>We stand here with an effort of bringing in stories to you, the stories which are cocooned within themselves. We gather stories from people from different fields of life, that can simply have an impact - be it personal, professional, social, or any other fields.</p>
                                </div>
                            </div>
                        </a>

                        <span class="read-btn-wrapp"><a href="#" class="read-more-btn btn">Read More Stories</a></span>
                    
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="inner-event-section all-sec-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <a href="#" class="about-title-side event-title"><h2>Upcoming <br> events</h2></a>
                        <a href="#" class="read-more-btn btn">Book your ticket</a>
                    </div>
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="inner-event">
                            <div class="image-wrapper">
                                <a href="#" class="event-slider-image"><img src="images/music series_3.jpg" alt="image"></a>
                            </div>
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