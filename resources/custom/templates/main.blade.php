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

	            <div class="col-md-8">

									<h1>@yield( 'title' )</h1>

									@yield( 'content' )

								</div>

								<div class="col-md-4">

										@includeif( 'sections.aside' )

								</div>

							</div> <!-- /row -->

					</div>
			</div>
	</div>
	@includeif( 'sections.footer' )

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
