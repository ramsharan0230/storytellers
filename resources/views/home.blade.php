@extends('layouts.master')

@section('title', 'Story Teller | Home')

@section('content')
@include('includes.header')

<div class="header-push"></div>

<!-- header section ends -->

<div class="abstract-background"><img src="{{ ('images/abstract-background.svg') }}" alt="image"></div>
@include('includes.main-slider')

<!-- main slider section ends -->

<!-- featured recent section starts -->

@include('includes.featured')

<!-- featured recent section ends -->

<!-- about us section starts -->

@include('includes.more_video')

<!-- about section ends -->

<!-- block section starts -->
@include('includes.block-section')

<!-- block section ends -->

<!-- events section starts -->

@include('includes.upcoming-events')

<!-- event section ends -->

    <!-- social media section starts -->

@include('includes.social_media')

    <!-- social media section ends -->
    <!-- footer section starts -->

@include('includes.footer')


@stop
