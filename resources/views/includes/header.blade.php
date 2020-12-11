<header id="header">
    <div class="container">
        <div class="header-wrapp">
            <a href="{{ route('home') }}" class="logo"><img src="{{ asset('images/logo.svg') }}" alt="logo-image"></a>
            <nav>
                <ul>
                    <li class="drop-menu-parent">
                        <a href="#" class="top__menu__bar">
                            <span class="menu__line"></span>
                            <span class="menu__line"></span>
                            <span class="menu__line"></span>
                        </a>
                        <div class="sub-menu">
                            <div class="container">
                                <div class="sub-row">
                                    <div class="row sub-menu-devider">
                                        <div class="col-lg-2">
                                            <a href="#" class="link-title">Videos</a>
                                            <ul class="sub-menu-wrapp">
                                                <li><a href="{{ route('featured-video-list') }}">Featured Videos</a></li>
                                                <li><a href="{{ route('video-list') }}">Recent Videos</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3">
                                            <a href="#" class="link-title">Upcomming Events</a>
                                            <ul class="sub-menu-wrapp">
                                                <li><a href="{{ route('bookings') }}">Storyteller Series</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3">
                                            <a href="#" class="link-title">Past Events</a>
                                            <ul class="sub-menu-wrapp">
                                                @forelse($allSeries as $series)
                                                    <li><a href="{{ route('series-detail', $series->id) }}">{{ $series->name }}</a></li>
                                                @empty 
                                                    <li>No Series Found!</li> 
                                                @endforelse  
                                            </ul>
                                        </div>
                                        <div class="col-lg-2">
                                            <a href="{{route('about-us') }}" class="link-title">About Us</a>
                                            <ul class="sub-menu-wrapp">
                                                <li><a href="{{ route('about-us') }}">The Storytellers</a></li>
                                                <li><a href="{{ route('about-us') }}">Team</a></li>
                                                <li><a href="{{ route('contact-us') }}">Contact</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-2">
                                            <a href="{{ route('blogs') }}" class="link-title">Blogs</a>
                                            <ul class="sub-menu-wrapp">
                                                @forelse ($blogs as $blog)
                                                    <li><a href="{{ route('blog-detail', $blog->slug) }}">{{ $blog->title }}</a></li>
                                                @empty
                                                    <li>No Blog Found!</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<div class="header-push"></div>

<!-- header section ends -->

<div class="abstract-background"><img src="{{ asset('images/abstract-background.svg') }}" alt="image"></div>