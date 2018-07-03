<div class="navigation">

<div class="container">

	<div class="row">

		<div class="col-md-12">

			<nav class="navbar navbar-expand-lg navbar-dark">

				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

							<span class="navbar-toggler-icon"></span>

				  </button>

				  <div class="row collapse navbar-collapse" id="navbarSupportedContent">
						<div class="col-lg-8">
				    <ul class="navbar-nav">

							<li class="nav-item {{ Request::is( '/' ) ? 'active' : '' }}">

									<a class="nav-link" href="{{ route( 'home' ) }}">

											<span class="nav-link-text">Home</span>

									</a>

							</li>

							<li class="nav-item {{ ( Request::is( 'movies' ) || Request::is( 'series' ) ) ? 'active' : '' }} dropdown">

								<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

										<span class="nav-link-text dropdown-toggle">Catalog</span>

				        </a>

				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

				          	<a class="dropdown-item {{ ( Request::is( 'movies' ) ) ? 'active' : '' }}" href="{{ url( 'movies' ) }}">Movies</a>

				          	<a class="dropdown-item {{ ( Request::is( 'series' ) ) ? 'active' : '' }}" href="{{ url( 'series' ) }}">Series</a>

										<a class="dropdown-item {{ ( Request::is( 'games' ) ) ? 'active' : '' }}" href="{{ url( 'games' ) }}">Games</a>

										<a class="dropdown-item {{ ( Request::is( 'old-movies' ) ) ? 'active' : '' }}" href="{{ url( 'old-movies' ) }}">We Sell Old Movies</a>

										<a class="dropdown-item {{ ( Request::is( 'kiddies-budget' ) ) ? 'active' : '' }}" href="{{ url( 'kiddies-budget' ) }}">Kiddies Budget</a>

				        </div>

				      </li>

							<li class="nav-item {{ Request::is( 'top-10' ) ? 'active' : '' }}">
								<a class="nav-link" href="{{ route( 'top-10' ) }}">
									<span class="nav-link-text">Top 10 Movies</span>
								</a>
							</li>

							<li class="nav-item {{ Request::is( 'top-rated' ) ? 'active' : '' }}">
								<a class="nav-link" href="{{ route( 'top-rated' ) }}">
									<span class="nav-link-text">Top Rated</span>
								</a>
							</li>

							<li class="nav-item {{ Request::is( 'about-us' ) ? 'active' : '' }}">
								<a class="nav-link" href="{{ route( 'about-us' ) }}">
									<span class="nav-link-text">About Us</span>
								</a>
							</li>

							<li class="nav-item {{ Request::is( 'contact-us' ) ? 'active' : '' }}">
								<a class="nav-link" href="{{ route( 'contact-us' ) }}">
									<span class="nav-link-text">Contact Us</span>
								</a>
							</li>

							<li class="nav-item d-lg-none d-md-block">
								@if( Auth::check() )
										<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
																 document.getElementById('logout-form').submit();">
											<span class="nav-link-text">Sign out</span>
										</a>
								@else
										<a class="nav-link" href="{{ route('sign-in') }}">
											<span class="nav-link-text">Sign In</span>
										</a>
								@endif
							</li>

				    </ul>
					</div>
				    <form class="form-inline my-2 my-lg-0 justify-content-end col-lg-4" method="get" action="{{ url( 'search' ) }}">

					      		<input class="search form-control rounded col-md-8" type="search" placeholder="Search" aria-label="Search" name="search" >

					      		<button class="search-btn btn col-xs-12 col-md-4" type="submit">Search</button>

				    </form>

				  </div>

			</nav>

		</div>

	</div>

	</div>

</div>
