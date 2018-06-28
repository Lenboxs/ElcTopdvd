@extends( 'templates.full-width' )

@section( 'content' )
@component( 'templates.one-column' )

    @slot('title')
        Games
    @endslot

          <div class="col-md-3">
              <label>Select a Branch</label>
              <select class="form-control">
                <option value="all" selected>All</option>
                @if( !empty( $branches ) )
                    @foreach( $branches as $branch )
                      <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                    @endforeach
                @endif
              </select>
          </div>
          <div class="col-md-3">
              <label>Select a Genre</label>
              <select class="form-control">
                <option value="all" selected>All</option>
                @if( !empty( $genres ) )
                    @foreach( $genres as $genre )
                      <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                @endif
              </select>
          </div>
          <div class="col-md-3">
              <label>Select a Console</label>
              <select class="form-control">
                <option value="all" selected>All</option>
                @if( !empty( $consoles ) )
                    @foreach( $consoles as $console )
                      <option value="{{ $console->id }}">{{ $console->name }}</option>
                    @endforeach
                @endif
              </select>
          </div>
          <div class="col-md-3">
              <label>Sort Games</label>
              <select class="form-control">
                <option value="all" selected>All</option>
              </select>
          </div>
        </div>

        <div class="row row-eq-height">
          @if( !empty( $games ) )

            @foreach( $games as $game )

                  <div class="col-md-3">
                      @component( 'sections.dvd' )

                          @slot('link')
                              {{ url( 'game/' . $game->slug ) }}
                          @endslot

                          @slot('img')
                              {{ url( 'img/games/' . $game->image ) }}
                          @endslot

                          {{ !empty( $game ) ? $game->name : '' }}

                      @endcomponent
                  </div>

            @endforeach
          @endif
        </div>
@endcomponent

@endsection
