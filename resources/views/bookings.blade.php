@extends('layouts.master')

@section('title', 'Bookings')
@push('styles')
    <x-embed-styles />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/inner.css') }}">
@endpush

@section('content')
@include('includes.header')

<section class="contact-page all-sec-padding">
    <div class="container">
        <div class="contact-page-title about-title-side booking-wrapp">
            <h2>Book your Tickets:</h2>
            <p>Fill the below form of Simply Call us at 0000000000 to Book your Tickets.</p>
        </div>
        <div class="contact-form-section">
            <div class="row">
                <div class="col-lg-6">
                    <form action="" class="contact-form">
                        <label for="">Name:</label>
                        <input type="text" placeholder="Enter Name">
                        <label for="">Cell Phone:</label>
                        <input type="text" placeholder="Enter Phone Number">
                        <label for="">Email:</label>
                        <input type="email" placeholder="Enter Email"> 
                        <label for="">Company:</label>
                        <input type="text" placeholder="Enter Company">
                        <label for="">Message:</label>
                        <textarea name="" id="" cols="30" rows="10" placeholder="Enter Your Message"></textarea>
                        <button>Submit</button>
                    </form>
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
