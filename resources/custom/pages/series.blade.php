@extends( 'templates.main' )

@section( 'title' )
{{ !empty( $title ) ? $title : '' }}
@endsection

@section( 'content' )

@component( 'templates.one-column' )

    @slot('title')
       {{ $series->name }}
    @endslot

    @if( !empty( $series ) )
        <div class="col-12">
            <div class="youtube">
                <iframe width="640" height="360" src="{{ $series->trailerLink }}" allow="autoplay; fullscreen" frameborder="no" scrolling="no" allowfullscreen="yes" style="width: 100%; height: 100%;"></iframe>
            </div>
        </div>

        <div class="col-12 my-5">
            <div class="lighter-head p-3"><h3>{{ $series->name }} ( Season {{ $series->season }} )<h3></div>
            <div class="lighter px-3">
              <div class="row">
                  <div class="col-sm-4 p-5">
                      <img src="{{ url( 'img/series/' . $series->image ) }}" class="w-100">
                  </div>
                  <div class="col-sm-8 py-5 pr-5">
                      @if( $series->new == 1 )<h4><span class="badge badge-danger">NEW</span></h4>@endif
                      <p><span class="label label-success">Name:</span> {{ $series->name }}</p>
                      <p><span class="label label-success">Season:</span> {{ $series->season }}</p>
                      <p><span class="label label-success">Description:</span> {{ $series->description }}</p>
                      <p><span class="label label-success">Rating:</span> <i class="fa fa-star text-yellow" aria-hidden="true"></i><i class="fa fa-star text-yellow" aria-hidden="true"></i><i class="fa fa-star text-yellow" aria-hidden="true"></i><i class="fa fa-star text-dark" aria-hidden="true"></i><i class="fa fa-star text-dark" aria-hidden="true"></i></p>
                  </div>
              </div>
            </div>
        </div>

        <div class="col-12 my-5">
            <div class="lighter-head p-3"><h3>Reviews<h3></div>
            <div class="lighter px-3 py-5">
              <div class="col-12">

              </div>
            </div>
        </div>
    @endif

@endcomponent

@endsection
