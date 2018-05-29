@extends( 'templates.main' )

@section( 'content' )
<h1><div class="display-4 p-3 bg-success text-white">Movies</div></h1>
<div class="content bg-dark text-white">
  <!--div class="content-background"></div>
  <div class="content-overlay"></div-->
    <div class="main-content">

      <div class="container">

        <div class="row">
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
          <div class="col-md-3">
              <label>Select a Category</label>
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

        <div class="row">
          @if( !empty( $movies ) )

            @foreach( $movies as $movie )
                <div class="col-md-2">
                  <div class="dvd">
                    <a href="{{ url( 'movie/' . $movie->slug ) }}"><h4 class="dvd-name">{{ !empty( $movie ) ? $movie->name : '' }}</h4></a>
                    <a href="{{ url( 'movie/' . $movie->slug ) }}">
                        <img src="{{ url( 'img/movies/' . $movie->image ) }}" class="img-responsive dvd-img">
                    </a>
                  </div>
                </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
</div>
@endsection
