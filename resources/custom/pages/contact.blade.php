@extends( 'templates.main' )

@section( 'content' )

  @includeif( 'widgets.contact-us' )

@endsection

@push( 'scripts' )
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
