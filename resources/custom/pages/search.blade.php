@extends( 'templates.main' )

@section( 'content' )

<h1><div class="display-4 p-3 bg-success text-white">Search Results</div></h1>

<div class="content bg-dark text-white">

    <div class="main-content">

				<div class="container">

					<div class="row">

				      <div class="col-md-8">

                <div class="row">
                  <div class="col-12">
                      <p class="lead p-3 lighter">Search Result for ... {{ $search }}</p>
                  </div>
                </div>

				      </div>

					</div>

				</div>

		</div>

</div>
@endsection
