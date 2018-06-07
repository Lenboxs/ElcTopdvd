@extends( 'templates.main' )

@section( 'content' )

@component( 'templates.one-column' )

    @slot('title')
        Top Rated
    @endslot
          <div class="col-md-3">
              <label>Select a Branch</label>
              <select class="form-control p-3 mb-2 bg-success text-white">
                <option value="all" selected>All</option>
                @if( !empty( $branches ) )
                    @foreach( $branches as $branch )
                      <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                    @endforeach
                @endif
              </select>

          </div>
@endcomponent

@endsection
