@php $dashboard = DB::table('dashboards')->first(); @endphp
<footer class="footer-section">
    <div class="container">
        <ul class="footer-media">
            <li><a href="{{ route('featured-video-list') }}">Featured Video</a></li>
            <li><a href="{{ route('video-list') }}">Recent Video</a></li>
            <li><a href="{{ route('about-us') }}">About Us</a></li>
            <li><a href="{{ route('bookings') }}">Bookings</a></li>
            <li><a href="{{ route('contact-us') }}">Contact</a></li>
            <li><a href="{{ $dashboard->facebook }}" target="_blank"><img src="{{ asset('images/pasted-svg-22903x188.svg') }}" alt="icon"></a></li>
            <li><a href="{{ $dashboard->instagram }}" target="_blank"><img src="{{ asset('images/pasted-svg-423945x97.svg') }}" alt="icon"></a></li>
        </ul>
    </div>
</footer>