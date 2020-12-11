@extends('layouts.master')

@section('title', 'Blogs')
@push('styles')
    <x-embed-styles />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/inner.css') }}">
@endpush

@section('content')
@include('includes.header')

<section class="contact-page all-sec-padding">
    <div class="container">
        
        <div class="inner-block-section all-sec-padding">
            <div class="container">
                <div class="row">
                    @forelse ($blogs as $blog)
                        <div class="col-lg-6 col-md-6 col-12">
                            <a href="{{ route('blog-detail', $blog->slug) }}" class="block-left-side block-right-side second-row">
                                <div class="block-content second-row-content">
                                    <div class="about-title-side second-row-title">
                                        <img width="100%" src="{{ asset('images/banners').'/'.$blog->image }}" class="block-right-image" alt="image">
                                        <h2>{{ $blog->title }}</h2>
                                    </div>
                                </div>
                                <div href="{{ route('blog-detail', $blog->slug) }}" class="slider-btn block-btn btn " tabindex="0">
                                    <img src="{{ asset('images/icon_arrrow right-1.png') }}" id="hide-in-hover" alt="icon">
                                    <img src="{{ asset('images/icon_arrrow right-2.png') }}" id="display-in-hover" alt="icon">
                                </div>
                            </a>
                        </div>
                    @empty
                        
                    @endforelse
                </div>
            </div>
            {{ $blogs->links() }}
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
