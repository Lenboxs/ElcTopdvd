@component( 'sections.box' )
    @slot('title')
        <span class="featured">Supported</span> Formats
    @endslot
    <div class="row">
        <div class="col-3"><div class="format"><img src="{{ url( 'img/formats/bluray.png' ) }}" class="format-img" /></div></div>
        <div class="col-3"><div class="format"><img src="{{ url( 'img/formats/dvd.png' ) }}" class="format-img" /></div></div>
        <div class="col-3"><div class="format"><img src="{{ url( 'img/formats/ps2.png' ) }}" class="format-img" /></div></div>
        <div class="col-3"><div class="format"><img src="{{ url( 'img/formats/ps3.png' ) }}" class="format-img" /></div></div>
        <div class="col-3"><div class="format"><img src="{{ url( 'img/formats/ps4.png' ) }}" class="format-img" /></div></div>
    </div>
@endcomponent
