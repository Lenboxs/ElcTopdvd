@extends( 'templates.full-width' )

@section( 'content' )
@component( 'templates.one-column' )

    @slot('title')
        Movies
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
              <label>Select a Type</label>
              <select class="form-control">
                <option value="all" selected>All</option>
                @if( !empty( $types ) )
                    @foreach( $types as $type )
                      <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                @endif
              </select>
          </div>
          <div class="col-md-3">
              <label>Sort Movies</label>
              <select class="form-control">
                <option value="all" selected>All</option>
              </select>
          </div>
        </div>

        <div class="row row-eq-height">
          @if( !empty( $movies ) )

            @foreach( $movies as $movie )

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

            @endforeach
          @endif
        </div>
@endcomponent

@endsection
