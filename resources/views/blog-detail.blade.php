@extends('layouts.master')

@section('title', $blog->title)
@push('styles')
    <x-embed-styles />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/inner.css') }}">
@endpush
@section('content')
@include('includes.header')
{{-- @include('includes.main-slider') --}}
    <section class="innerpage-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-12">
                    <a href="#" class="block-left-side block-right-side">
                        <div class="block-content">
                            <div class="about-title-side">
                                <h2>{{ $blog->title }}</h2>
                                <img src="{{ asset('images/banners').'/'.$blog->image }}" class="block-right-image img-blog" alt="image">
                                <p>{{ strip_tags($blog->description) }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('includes.social_media')

    <!-- social media section ends -->
    <!-- footer section starts -->

@include('includes.footer')


@stop