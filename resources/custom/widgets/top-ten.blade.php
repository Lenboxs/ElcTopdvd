@component( 'sections.box' )

    @slot('title')
        Top Ten Movies
    @endslot

    <div class="row">

      <div class="col-12">
          @component( 'sections.alert' )
            Here follows a list of the top ten movies.
          @endcomponent
      </div>

      <div class="col-12">
          @if( !empty( $movies ) )
            @foreach( $movies->reverse() as $key => $movie )
              <div class="top-dvd">
                <h2 class="font-bold m-3">{{ $key + 1 }}. {{ $movie->name }} </h2>
                <div class="row top-ten-dvd">
                <div class="col-md-4">
                    @component( 'sections.dvd' )

                        @slot('link')
                            {{ url( 'movie/' . $movie->slug ) }}
                        @endslot

                        @slot('img')
                            {{ url( 'img/movies/' . $movie->image ) }}
                        @endslot

                        {{ !empty( $movie ) ? $movie->name : '' }}

                    @endcomponent
                </div>
                <div class="col-md-8">
                  <p class="lead top-ten-description">{{ $movie->description }}</p>
                </div>
              </div>
              </div>
            @endforeach
          @endif
      </div>
    </div>

@endcomponent
