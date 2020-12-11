<section class="main-slider">
    <div class="container">
        <div class="main-slide">
            @foreach($allEvents as $key => $event)
            <div class="slider-wrapper">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-12">
                        <a href="{{ route('event-detail', $event->slug) }}" class="slider-image-side">
                            <img src="{{ asset('images/banners/'.$event->banner_image) }}" alt="slider-image">
                            <span class="slider-time">29:17</span>
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="slider-content-side">
                            <a href="{{ route('event-detail', $event->slug) }}" class="slider-btn btn">
                                <img src="{{ asset('images/icon_arrrow right-1.png') }}" id="hide-in-hover" alt="icon">
                                <img src="{{ asset('images/icon_arrrow right-2.png') }}" id="display-in-hover" alt="icon">
                            </a>
                            <a href="{{ route('event-detail', $event->slug) }}" class="slider-title-wrapper">
                                <span>{{ $event->guest->name }}, {{ $event->guest->designation }}, {{ $event->guest->organization }}</span>
                                
                                <h1>
                                    @if(strlen($event->highlight_text) > 60)
                                    {{substr($event->highlight_text,0,60)}}
                                    @else
                                    {{$event->highlight_text}}
                                    @endif
                                    ....
                                </h1>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>