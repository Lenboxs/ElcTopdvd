@extends( 'templates.main' )

@section( 'title' )
{{ !empty( $title ) ? $title : '' }}
@endsection

@section( 'content' )

<h1>{{ $movie->name }}</h1>
<img src="{{ url( 'img/movies/' . $movie->image ) }}" class="img-responsive">
<p>{{ $movie->description }}</p>

<embed width="420" height="315"
src="{{ $movie->trailerLink }}">
<iframe width="853" height="480" src="{{ $movie->trailerLink }}" frameborder="0" allowfullscreen ng-show="showvideo"></iframe>
@endsection
