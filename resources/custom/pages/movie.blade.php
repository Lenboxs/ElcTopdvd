@extends( 'templates.main' )

@section( 'title' )
{{ !empty( $title ) ? $title : '' }}
@endsection

@section( 'content' )

<h1>{{ $movie->name }}</h1>
<img src="{{ url( 'img/movies/' . $movie->image ) }}" class="img-responsive">
<p>{{ $movie->description }}</p>

@if( !empty( $movie->trailerLink ) )

  @if( strpos( $movie->trailerLink, 'embed' ) !== false )
    <div class="col-sm-6 col-xs-12 mg-b30 move-bf">
     <div class="youtube">
       <iframe width="560" height="315" src="{{ $movie->trailerLink }}" frameborder="0" allowfullscreen></iframe>
     </div>
    </div>
  @else( strpos( $movie->trailerLink, 'watch' ) !== false )
    <div class="col-sm-6 col-xs-12 mg-b30 move-bf">
     <div class="youtube">
       <iframe width="560" height="315" src="https://www.youtube.com/embed/dxWvtMOGAhw?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
     </div>
    </div>
  @endif

@endif
@endsection
