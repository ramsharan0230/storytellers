<section class="featured-section">
    <div class="container">
        <ul class="nav nav-tabs featured-tabs">
            <li><a class="active" data-toggle="tab" href="#featured">Featured</a></li>
            <li><a data-toggle="tab" href="#recent">Recent</a></li>
        </ul>

        <div class="tab-content featured-content">
            <div id="featured" class="tab-pane fade in active">
               <div class="row front-tab-wrapper">
                @forelse ($featuredEvents as $key => $featureEvent)
                   <div class="col-lg-4 col-md-6 col-6 col-wrapp">
                       <div class="featured-card">
                           <a href="{{ route('event-detail', $featureEvent->slug) }}" class="feature-image">
                                <img src="{{ asset('images/banners').'/'.$featureEvent->banner_image }}" class="block-right-image" alt="image"><span class="feature-time">29:30</span>
                            </a>
                            <a href="{{ route('event-detail', $featureEvent->slug) }}" class="featured-title-wrapp">
                                <span class="featured-icon">
                                    <img src="{{ asset('images/icon_arrrow-right_2-u4551-fr.png') }}" id="hidden-on-hover" alt="icon"><img src="{{ asset('images/icon_arrrow-right_2-2.png') }}" id="display-on-hover" alt="icon"></span>
                                <div class="featured-title-side">
                                    <h3>{{ $featureEvent->title }}</h3>
                                    <p class="featured-name">{{ $featureEvent->guest->name }}</p>
                                </div>
                            </a>
                       </div>
                   </div>
                   @empty
                <p>No Event Found</p>
                @endforelse
               </div>
               <span class="video-btn-wrapper"><a href="{{ route('video-list') }}" class="more-btn btn">More Videos</a></span>
            </div>
            <div id="recent" class="tab-pane fade">
                <div class="row front-tab-wrapper">
                    @forelse ($recentEvents as $key => $recentEvent)
                   <div class="col-lg-4 col-md-6 col-6 col-wrapp">
                       <div class="featured-card">
                           <a href="{{ route('event-detail', $recentEvent->slug) }}" class="feature-image">
                                <img src="{{ asset('images/banners').'/'.$recentEvent->banner_image }}" class="block-right-image" alt="image">
                            </a>
                            <a href="{{ route('event-detail', $recentEvent->slug) }}" class="featured-title-wrapp">
                                <span class="featured-icon">
                                    <img src="{{ asset('images/icon_arrrow-right_2-u4551-fr.png') }}" id="hidden-on-hover" alt="icon"><img src="{{ asset('images/icon_arrrow-right_2-2.png') }}" id="display-on-hover" alt="icon"></span>
                                <div class="featured-title-side">
                                    <h3>{{ $recentEvent->title }}</h3>
                                    <p class="featured-name">{{ $recentEvent->guest->name }}</p>
                                </div>
                            </a>
                       </div>
                   </div>
                   @empty
                <p>No Event Found</p>
                @endforelse
               </div>
               <span class="video-btn-wrapper"><a href="{{ route('video-list') }}" class="more-btn btn">More Videos</a></span>
            </div>
        </div>
    </div>
</section>