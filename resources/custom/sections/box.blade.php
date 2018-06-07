<div class="box box-dark featured-box">
  @if( !empty( $title ) )
    <div class="box-heading">
      <div class="heading-strip"></div>
      <div class="box-title d-inline-block px-3">{{ $title }}</div>
    </div>
  @endif
  <div class="box-body">
    {{ $slot }}
  </div>
</div>
