<div class="header">

		<div class="container">

			<div class="row">

				<div class="col-md-6">
					<a class="home-link d-inline-block" href="{{ url('/') }}">
							<img src="{{ asset( 'img/settings/' . config::get( 'settings.logo' ) ) }}" class="logo img-responsive" />
					</a>

				</div>

				<div class="col-md-6 text-right d-none d-lg-block">
						@if( Auth::check() )
								<a href="{{ route('logout') }}" class="register col-md-4 text-center d-inline-block" onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
										Sign out
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
								</form>
						@else
								<a href="{{ route('sign-in') }}" class="register col-md-4 text-center d-inline-block">Sign In</a>
						@endif
				</div>

			</div>

		</div>

</div>
