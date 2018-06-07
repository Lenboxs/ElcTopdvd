<div class="footer">

	<div class="container">
		<div class="row">
			<div class="col-md-6  float-md-left">
				Copyright &copy; <?php echo ( new \DateTime() )->format( 'Y' ); ?>. <a href="{{ url( '/' ) }}">Top DVD</a>. All Rights reserved. {{--| <a href="{{ url( 'privacy-policy' ) }}">Privacy Policy</a> | <a href="{{ url( 'terms-and-conditions' ) }}">Terms and Conditions</a>--}}
			</div>
			<div class="col-md-6">
				<ul class="social-media float-md-right">

					@if( !empty( config( 'settings.facebook' ) ) )
						<li class="d-inline-block rounded lighter">
							<a href="{{ config::get( 'settings.facebook' ) }}" target="_blank" class="d-inline-block rounded facebook"><i class="fab fa-facebook-f"></i></a>
						</li>
					@endif

					@if( !empty( config( 'settings.twitter' ) ) )
						<li class="d-inline-block rounded lighter">
							<a href="{{ config::get( 'settings.twitter' ) }}" target="_blank" class="d-inline-block rounded twitter"><i class="fab fa-twitter"></i></a>
						</li>
					@endif

					@if( !empty( config( 'settings.linkedin' ) ) )
						<li class="d-inline-block rounded lighter">
							<a href="{{ config::get( 'settings.linkedin' ) }}" target="_blank" class="d-inline-block rounded linkedin"><i class="fab fa-linkedin"></i></a>
						</li>
					@endif

				</ul>
			</div>
		</div>
	</div>

</div>
