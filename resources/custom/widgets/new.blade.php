@component( 'sections.box' )

    @slot('title')
        @if( !empty( $home ) && !empty( $home->heading ) )
          {{ $home->heading }}
        @endif
    @endslot

        <div class="col-md-12">
            @includeif( 'alerts.new-releases' )
        </div>
        @foreach( $movies as $key => $movie )

            @if( $key == 0 || $key == 5 )
            
                <div class="col-md-4 col-md-4-5">

            @elseif( $key == 2 )

                <div class="col-md-3 col-md-3-0">

            @endif

                @component( 'sections.new-release' )

                    @slot('link')
                        {{ url( 'movie/' . $movie->slug ) }}
                    @endslot

                    @slot('img')
                        {{ url( 'img/movies/' . $movie->image ) }}
                    @endslot

                    @slot('date')
                        <?php echo ( new \DateTime() )->format( 'Y-m-d' ); ?>
                    @endslot

                    {{ !empty( $movie ) ? $movie->name : '' }}

                @endcomponent

            @if( $key == 1 || $key == 4 || $key == 6 )
                </div>
            @endif

        @endforeach

@endcomponent
