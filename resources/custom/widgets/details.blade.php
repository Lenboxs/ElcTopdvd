@component( 'sections.box' )

    @slot('title')
        Movie Details
    @endslot

    <div class="col-sm-4 p-2">
        <img src="{{ url( 'img/movies/' . $movie->image ) }}" class="w-100">
    </div>
    <div class="col-sm-8 py-5 pr-5">
        @if( $movie->new == 1 )<h4><span class="badge badge-danger">NEW</span></h4>@endif
        <p><span class="label label-success">Name:</span> {{ $movie->name }}</p>
        <p><span class="label label-success">Description:</span> {{ $movie->description }}</p>
        <p><span class="label label-success">Rating:</span> <i class="fa fa-star text-yellow" aria-hidden="true"></i><i class="fa fa-star text-yellow" aria-hidden="true"></i><i class="fa fa-star text-yellow" aria-hidden="true"></i><i class="fa fa-star text-dark" aria-hidden="true"></i><i class="fa fa-star text-dark" aria-hidden="true"></i></p>
    </div>

@endcomponent
