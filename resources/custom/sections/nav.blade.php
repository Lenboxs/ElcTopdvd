<div class="navigation">

		<nav class="navbar navbar-expand-lg navbar-dark bg-darker">

				<div class="container">

							  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							    	<span class="navbar-toggler-icon"></span>
							  </button>

							  <div class="collapse navbar-collapse" id="navbarSupportedContent">
							    <ul class="navbar-nav mr-auto">
										<li class="nav-item {{ Request::is( '/' ) ? 'active' : '' }}"><a class="nav-link font-weight-bold" href="{{ route( 'home' ) }}">Home</a></li>
										<li class="nav-item {{ Request::is( 'top-10' ) ? 'active' : '' }}"><a class="nav-link" href="{{ route( 'top-10' ) }}">Top 10 Movies</a></li>
										<li class="nav-item {{ Request::is( 'top-rated' ) ? 'active' : '' }}"><a class="nav-link" href="{{ route( 'top-rated' ) }}">Top Rated</a></li>
							      <li class="nav-item {{ ( Request::is( 'movies' ) || Request::is( 'series' ) ) ? 'active' : '' }} dropdown">
							        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							          Catalog
							        </a>
							        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
							          <a class="dropdown-item text-white" href="{{ url( 'movies' ) }}">Movies</a>
							          <a class="dropdown-item text-white" href="{{ url( 'series' ) }}">Series</a>
							        </div>
							      </li>
										<li class="nav-item {{ Request::is( 'contact-us' ) ? 'active' : '' }}"><a class="nav-link" href="{{ route( 'contact-us' ) }}">Contact Us</a></li>
							    </ul>
							    <form class="form-inline my-2 my-lg-0 justify-content-end">
							      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
							      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
							    </form>
							  </div>

				</div>

		</nav>

</div>
