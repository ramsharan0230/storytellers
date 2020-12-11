<section class="block-section all-sec-padding">
    <div class="container">
        @if(count($blogs)>=3)
        <div class="row">
            <div class="col-lg-7 col-md-7 col-12">
                <a href="#" class="block-left-side">
                    <div href="#" class="slider-btn block-btn btn " tabindex="0">
                        <img src="{{ asset('images/icon_arrrow right-1.png') }}" id="hide-in-hover" alt="icon">
                        <img src="{{ asset('images/icon_arrrow right-2.png') }}" id="display-in-hover" alt="icon">
                    </div>
                    <div class="block-content">
                        <div class="about-title-side">
                            <h2>{{ $blogs[0]->title }}</h2>
                            <p>{{ strip_tags($blogs[0]->description) }}</p>
                        </div>
                    </div>
                </a>
                <a href="#" class="block-left-side block-left-second">
                    <div href="#" class="slider-btn block-btn btn " tabindex="0">
                        <img src="{{ asset('images/icon_arrrow right-1.png') }}" id="hide-in-hover" alt="icon">
                        <img src="{{ asset('images/icon_arrrow right-2.png') }}" id="display-in-hover" alt="icon">
                    </div>
                    <div class="block-content block-second-content">
                        <div class="about-title-side ">
                            <h2>{{ $blogs[1]->title }}</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-5 col-md-5 col-12">
                <a href="#" class="block-left-side block-right-side">
                    <div class="block-content">
                        <div class="about-title-side">
                            <h2>{{ $blogs[2]->title }}</h2>
                            <img src="{{ asset('images/banners').'/'.$blogs[2]->image }}" class="block-right-image" alt="image">
                            <p>{{ strip_tags($blogs[2]->description) }}</p>
                        </div>
                    </div>
                    <div href="#" class="slider-btn block-btn btn " tabindex="0">
                        <img src="{{ asset('images/icon_arrrow right-1.png') }}" id="hide-in-hover" alt="icon">
                        <img src="{{ asset('images/icon_arrrow right-2.png') }}" id="display-in-hover" alt="icon">
                    </div>
                </a>
            </div>
        </div>
        @endif
        @if(count($blogs)>=5)
        <div class="row">
            <div class="col-lg-5 col-md-5 col-12">
                <a href="#" class="block-left-side block-right-side second-row">
                    <div class="block-content second-row-content">
                        <div class="about-title-side second-row-title">
                            <img width="100%" src="{{ asset('images/banners').'/'.$blogs[3]->image }}" class="block-right-image" alt="image">
                            <h2>{{ $blogs[3]->title }}</h2>
                        </div>
                    </div>
                    <div href="#" class="slider-btn block-btn btn " tabindex="0">
                        <img src="{{ asset('images/icon_arrrow right-1.png') }}" id="hide-in-hover" alt="icon">
                        <img src="{{ asset('images/icon_arrrow right-2.png') }}" id="display-in-hover" alt="icon">
                    </div>
                </a>
            </div>
            <div class="col-lg-7 col-md-7 col-12">
                <a href="#" class="block-left-side">
                    <div href="#" class="slider-btn block-btn btn " tabindex="0">
                        <img src="{{ asset('images/icon_arrrow right-1.png') }}" id="hide-in-hover" alt="icon">
                        <img src="{{ asset('images/icon_arrrow right-2.png') }}" id="display-in-hover" alt="icon">
                    </div>
                    <div class="block-content">
                        <div class="about-title-side">
                            <h2>{{ $blogs[4]->title }}</h2>
                            <p>{{ strip_tags($blogs[4]->description) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endif
    </div>
</section>