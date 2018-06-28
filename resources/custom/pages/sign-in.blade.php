@extends( 'templates.full-width' )

@section( 'content' )

    <div class="row">
      <div class="col-md-6 my-5">
          @includeif( 'auth.login' )
      </div>

      <div class="col-md-6 my-5">
          @includeif( 'auth.register' )
      </div>
    </div>

@endsection
