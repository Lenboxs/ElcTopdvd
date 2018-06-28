@extends( 'templates.main' )

@section( 'content' )

    @if( !empty( $slider ) )

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">

                  @if( !empty( $slider->slides ) )

                      @foreach( $slider->slides as $key => $slide )

                            @if( !empty( $slide ) && !empty( $slide->link ) )<a href="{{ $slide->link }}">@endif
                              <div class="carousel-item {{ !empty( $key == 0 ) ? 'active' : '' }}">
                                <img class="d-block w-100" src="{{ asset( 'img/slides/' . $slide->image ) }}">
                              </div>
                            @if( !empty( $slide ) && !empty( $slide->link ) )</a>@endif

                      @endforeach

                  @endif

              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>

        </div>

    @endif
    </br>

    @if( !empty( $movies ) )
      @includeif( 'widgets.new' )
    @endif

@endsection
