<div class="footer">

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				Copyright &copy; <?php echo ( new \DateTime() )->format( 'Y' ); ?>. <a href="{{ url( '/' ) }}">Top DVD</a>. All Rights reserved. {{--| <a href="{{ url( 'privacy-policy' ) }}">Privacy Policy</a> | <a href="{{ url( 'terms-and-conditions' ) }}">Terms and Conditions</a>--}}
			</div>
			<div class="col-md-6 justify-content-end">
				<ul class="social-media text-right">

					@if( !empty( config( 'settings.facebook' ) ) )
						<li class="d-inline">
							<a href="{{ config::get( 'settings.facebook' ) }}" target="_blank" class="d-inline-block"><i class="fab fa-facebook-f"></i></a>
						</li>
					@endif

					@if( !empty( config( 'settings.twitter' ) ) )
						<li class="d-inline">
							<a href="{{ config::get( 'settings.twitter' ) }}" target="_blank" class="d-inline-block"><i class="fab fa-twitter-f"></i></a>
						</li>
					@endif

					@if( !empty( config( 'settings.linkedin' ) ) )
						<li class="d-inline">
							<a href="{{ config::get( 'settings.linkedin' ) }}" target="_blank" class="d-inline-block"><i class="fab fa-linkedin-f"></i></a>
						</li>
					@endif

				</ul>
			</div>
		</div>
	</div>

</div>
