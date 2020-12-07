@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
@include('includes.header')

<div class="header-push"></div>

<!-- header section ends -->

<div class="abstract-background"><img src="images/abstract-background.svg" alt="image"></div>
<section class="contact-page">
    <div class="container">
        <div class="contact-page-title about-title-side">
            <h2>Contact Us:</h2>
        </div>
        <div class="contact-address all-sec-padding">
            <ul>
                <li>Patan Dhoka, Lalitpur, Nepal</li>
                <li>Tel: +977-1-0000000</li>
                <li><a href="#">Email: info@thestorytellersnepal.com</a></li>
            </ul>
        </div>
        <div class="contact-form-section all-sec-padding">
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
