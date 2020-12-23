<section class="events-section all-sec-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
                <a href="{{ route('bookings') }}" class="about-title-side event-title"><h2>Upcoming <br> events</h2></a>
                <a href="{{ route('bookings') }}" class="read-more-btn btn">Book your ticket</a>
            </div>
            <div class="col-lg-8 col-md-8 col-12">
                <div class="event-slider">
                    @forelse ($upcomingEvents as $upcomingEvent)
                    <div class="image-wrapper">
                        <a href="#" class="event-slider-image"><img src="{{ asset('images/event-storytellers-series.jpg') }}" alt="image"></a>
                    </div>
                    @empty
                    <h2>No Upcoming Event!!</h2>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>