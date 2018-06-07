<a href="{{ $link }}" class="my-5">
    <div class="dvd">
        <img src="{{ $img }}" class="img-responsive dvd-img">
        <p class="dvd-name text-center">{{ $slot }}</p>
    </div>
</a>

@includeif( 'alerts.release-date' )
