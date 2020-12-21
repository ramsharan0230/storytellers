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
        <div class="page-heading">
            <h1 class="page-title">Bookings</h1>
            @include('admin.layouts._partials.messages.info')
        </div>
        <div class="contact-form-section">
            <div class="row">
                <div class="col-lg-6">
                    <form method="post" class="contact-form" action="{{ route('booking.store') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <label for="event_id">Select Event:</label>
                        <select name="upcoming_event_id" id="event_id" class="form-control">
                            <option value="">Select Event</option>
                            @forelse ($upcomingEvents as $upcomingEvent)
                                <option value="{{ $upcomingEvent->id }}">{{ $upcomingEvent->title }}</option>
                            @empty
                                <option value="">No Event Found</option>
                            @endforelse
                        </select>

                        <label for="name">Name:</label>
                        <input type="text" name="name" placeholder="Enter Name">

                        <label for="phone">Cell Phone:</label>
                        <input type="text" name="phone" id="phone" placeholder="Enter Phone Number">

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Enter Email"> 

                        <label for="company">Company:</label>
                        <input type="text" name="company" id="company" placeholder="Enter Company">

                        <label for="address">Address:</label>
                        <textarea name="address" id="address" cols="30" rows="3" placeholder="Enter Your Address"></textarea>

                        <label for="message">Message:</label>
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter Your Message"></textarea>
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
