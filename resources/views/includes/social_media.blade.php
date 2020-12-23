<section class="social-media-section all-sec-padding">
    <div class="container">
        <div class="social-media-wrap">
            @php $social = DB::table('dashboards')->first(); @endphp
            <a target="_blank" href="{{ $social->facebook }}"><img src="{{ asset('images/icon facebook-1.png') }}" alt="image"></a>
            <a target="_blank" href="{{ $social->youtube }}"><img src="{{ asset('images/icon youtube-1.png') }}" alt="image"></a>
            <a target="_blank" href="{{ $social->instagram }}"><img src="{{ asset('images/icon insta-1.png') }}" alt="image"></a>
        </div>
    </div>
</section>