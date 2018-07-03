<div class="box box-dark featured-box">
  @if( !empty( $title ) )
    <div class="box-heading">
      <div class="heading-strip"></div>
      <div class="box-title d-inline-block px-3">
          <span class="featured">{{ strtok( $title ," ") }}</span>
          {{ strstr( $title ," ") }}
      </div>
    </div>
  @endif
  <div class="box-body">
    <div class="container-fluid">
      <div class="row">
        {{ $slot }}
      </div>
    </div>
  </div>
</div>
