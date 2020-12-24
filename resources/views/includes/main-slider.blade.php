<section class="main-slider">
    <div class="container">
        <div class="main-slide" style="margin-top: -50px">
            @forelse($sliders as $key => $slider)
            <div class="slider-wrapper" style="width: 100%; display: inline-block;">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-12">
                        <a href="{{ route('event-detail', $slider->slug) }}" class="slider-image-side">
                            <img width="635px" height="370px"  src="{{ asset('images/banners/'.$slider->banner_image) }}" alt="slider-image">
                            <span class="slider-time">29:17</span>
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="slider-content-side">
                            <a href="{{ route('event-detail', $slider->slug) }}" class="slider-btn btn">
                                <img src="{{ asset('images/icon_arrrow right-1.png') }}" id="hide-in-hover" alt="icon">
                                <img src="{{ asset('images/icon_arrrow right-2.png') }}" id="display-in-hover" alt="icon">
                            </a>
                            <a href="{{ route('event-detail', $slider->slug) }}" class="slider-title-wrapper">
                                <span>{{ $slider->guest->name }}, {{ $slider->guest->designation }}, {{ $slider->guest->organization }}</span>
                                
                                <h1>
                                    @if(strlen($slider->highlight_text) > 60)
                                    {!! substr($slider->highlight_text,0,60) !!}
                                    @else
                                    {!! $slider->highlight_text !!}
                                    @endif
                                    ....
                                </h1>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <h3>No Slider Found!</h3>
            @endempty
        </div>
    </div>
</section>