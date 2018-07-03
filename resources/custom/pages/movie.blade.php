@extends( 'templates.main' )

@section( 'title' )
{{ ( !empty( $movie ) && !empty( $movie->name ) ) ? $movie->name : '' }}
@endsection

@section( 'content' )

    @if( !empty( $movie ) )

      <div class="row">

        <div class="col-12">

          @includeif( 'widgets.title' )

            <div class="youtube">

                <iframe width="640" height="360" src="{{ $movie->trailerLink }}" allow="autoplay; fullscreen" frameborder="no" scrolling="no" allowfullscreen="yes" style="width: 100%; height: 100%;"></iframe>

            </div>

          @includeif( 'widgets.details' )

          @includeif( 'widgets.reviews' )

        </div>

      </div>

    @endif

@endsection
