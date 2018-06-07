@extends( 'templates.main' )

@section( 'content' )

    @component( 'templates.one-column' )

            <div class="col-md-6 my-5">
                @includeif( 'auth.login' )
            </div>

            <div class="col-md-6 my-5">
                @includeif( 'auth.register' )
            </div>
    @endcomponent

@endsection
