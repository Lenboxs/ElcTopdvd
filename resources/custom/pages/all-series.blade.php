@extends( 'templates.main' )

@section( 'content' )

@component( 'templates.one-column' )

    @slot('title')
        Series
    @endslot

          <div class="col-md-3">
              <label>Select a Branch</label>
              <select class="form-control p-3 mb-2">
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
              <label>Sort Series</label>
              <select class="form-control">
                <option value="all" selected>All</option>
              </select>
          </div>
        </div>

        <div class="row row-eq-height">
          @if( !empty( $series ) )

            @foreach( $series as $serie )
                <div class="col-md-3">
                    @component( 'sections.dvd' )

                        @slot('link')
                            {{ url( 'series/' . $serie->slug ) }}
                        @endslot

                        @slot('img')
                            {{ url( 'img/series/' . $serie->image ) }}
                        @endslot

                        {{ !empty( $serie ) ? $serie->name : '' }}

                    @endcomponent
                </div>
            @endforeach
          @endif
        </div>
@endcomponent
@endsection
