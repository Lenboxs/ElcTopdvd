@extends( 'templates.main' )

@section( 'content' )
<h1><div class="display-4 p-3 bg-info text-white">Movies</div></h1>
<div class="content ">
  <div class="content-background"></div>
  <div class="content-overlay"></div>
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
            <div class="col-md-2">
              <div class="dvd">
                <a href="#"><h4 class="dvd-name">Deadpool 2 (2018)</h4></a>
                <a href="#">
                    <img src="{{ url( 'img/new/deadpool-2.jpg' ) }}" class="img-responsive dvd-img">
                </a>
              </div>
            </div>
            <div class="col-md-2">
              <div class="dvd">
                <a href="#"><h4 class="dvd-name">Annihilation (2018)</h4></a>
                <a href="#">
                  <img src="{{ url( 'img/new/annihilation.jpg' ) }}" class="img-responsive dvd-img">
                </a>
              </div>
            </div>
            <div class="col-md-2">
              <div class="dvd">
                <a href="#"><h4 class="dvd-name">Black Panther (2018)</h4></a>
                <a href="#">
                  <img src="{{ url( 'img/new/black-panther.jpg' ) }}" class="img-responsive dvd-img">
                </a>
              </div>
            </div>
            <div class="col-md-2">
              <div class="dvd">
                <a href="#"><h4 class="dvd-name">A Wrinkle in Time (2018)</h4></a>
                <a href="#">
                  <img src="{{ url( 'img/new/a-wrinkle-in-time.jpg' ) }}" class="img-responsive dvd-img">
                </a>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
