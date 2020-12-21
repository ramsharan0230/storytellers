<section class="about-section all-sec-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
                <a href="{{ route('about-us') }}" class="about-title-side event-title"><h2>Know more about us</h2></a>
                <a href="{{ route('about-us') }}" class="slider-btn btn about-btn" tabindex="0">
                    <p>More</p>
                    <img src="{{ asset('images/icon_arrrow right-1.png') }}" id="hide-in-hover" alt="icon">
                    <img src="{{ asset('images/icon_arrrow right-2.png') }}" id="display-in-hover" alt="icon">
                </a>
            </div>
            <div class="col-lg-8 col-md-8 col-12">
                <div class="about-content-side">
                    <h3>{{ $about->highlight_text }} ...</h3>
                </div>
            </div>
        </div>
    </div>
</section>