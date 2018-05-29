@extends( 'templates.main' )

@section( 'content' )

<h1><div class="display-4 p-3 bg-success text-white">Top 10 Movies</div></h1>
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
        </div>
      </div>
    </div>
</div>
@endsection
