@component( 'sections.box' )
    @slot('title')
        Supported Formats
    @endslot
    <div class="row">
        @if( !empty( $types ) )
            @foreach( $types as $type )
                <div class="col-3"><div class="format"><img src="{{ url( 'img/types/' . $type->logo ) }}" class="format-img" /></div></div>
            @endforeach
        @endif

        @if( !empty( $consoles ) )
            @foreach( $consoles as $console )
                <div class="col-3"><div class="format"><img src="{{ url( 'img/consoles/' . $console->logo ) }}" class="format-img" /></div></div>
            @endforeach
        @endif
    </div>
@endcomponent
