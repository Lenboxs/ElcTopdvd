@extends( 'templates.main' )

@section( 'content' )

  @component( 'templates.one-column' )

      @slot('title')
          {{ !empty( $topten ) ? $topten->heading : 'Top 10 Movies' }}
      @endslot
          <div class="col-12">
              <p class="lead p-3 lighter">Here follows a list of the top ten movies.</p>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
              @if( !empty( $movies ) )
                @foreach( $movies->reverse() as $key => $movie )
                  <div class="top-dvd">
                    <h2 class="font-bold m-3">{{ $key + 1 }}. {{ $movie->name }} </h2>

                    <div class="col-md-3">
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
                    
                    <p class="lead p-3 m-3 lighter">{{ $movie->description }}</p>
                  </div>
                @endforeach
              @endif
          </div>
        </div>
    @endcomponent
@endsection
