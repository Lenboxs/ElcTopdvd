@extends( 'templates.main' )

@section( 'content' )

<div class="content">

    <div class="main-content">

        <div class="container">

          <div class="row">
            <div class="col-md-8">
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="{{ asset( 'img/home/sample-5.jpg' ) }}" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{ asset( 'img/home/sample-2.jpg' ) }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{ asset( 'img/home/sample-3.jpg' ) }}" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{ asset( 'img/home/sample-4.jpg' ) }}" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{ asset( 'img/home/sample-1.jpg' ) }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{ asset( 'img/home/sample-6.jpg' ) }}" alt="Third slide">
                </div>
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

              </br>

              @if( !empty( $movies ) )
                @includeif( 'widgets.new' )
              @endif
            </div>
              <div class="col-md-4">
                  @includeif( 'widgets.contract-special' )

                  @includeif( 'widgets.social-media' )

                  @includeif( 'widgets.supporting-formats' )
              </div>
            </div> <!-- /row -->

        </div>
    </div>
</div>
@endsection

@push( 'custom-scripts' )
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@endpush
