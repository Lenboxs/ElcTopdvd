@extends( 'layouts.app' )

@section( 'title' )

@endsection

@section( 'template' )

	@includeif( 'sections.header' )

	@includeif( 'sections.nav' )

	<div class="content">

	    <div class="main-content">

	        <div class="container">


	          <div class="row">
	              <div class="col-md-12">

						        @yield( 'content' )

    				    </div>
						</div> <!-- /row -->

					</div>
			</div>
	</div>
	@includeif( 'sections.footer' )

@endsection
