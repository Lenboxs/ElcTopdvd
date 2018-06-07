<div class="header">

		<div class="container">

			<div class="row">

				<div class="col-md-6">
					<a class="home-link d-inline-block" href="{{ url('/') }}">
							<img src="{{ asset( 'img/settings/' . config::get( 'settings.logo' ) ) }}" class="logo img-responsive" />
					</a>

				</div>

				<div class="col-md-6 text-right">

						<a href="{{ route('sign-in') }}" class="register col-md-4 text-center d-inline-block">Sign In</a>

				</div>

			</div>

		</div>

</div>
