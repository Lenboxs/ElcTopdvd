

<div class="content text-white">

    <div class="main-content">

				<div class="container">

					<div class="row">
            @if( !empty( $title ) && $title != ' ' )
            <div class="col-md-12"><h1 class="d-inline-block"><div class="display-5 px-4 py-3 bg-success text-white rounded">{{ $title }}</div></h1></div>
            @endif
            {{ $slot }}

					</div>

				</div>

		</div>

</div>
