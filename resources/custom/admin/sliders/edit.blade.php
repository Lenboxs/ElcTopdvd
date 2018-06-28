@extends( 'admin.layouts.admin' )

@section( 'title' )
{{ $title }}
@endsection

@push('styles')
<!-- Morris.js charts -->
<link rel="stylesheet" href="{{ url( 'plugins/select2/select2.css' ) }}">
@endpush

@section( 'content' )

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">{{ !empty( $title ) ? $title : 'Edit Slider' }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="{{ url( '/admin/update-movie' ) }}" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <input type="hidden" name="id" value="{{ ( !empty( $slider ) && !empty( $slider->id ) ) ? $slider->id : '' }}" />

                <div class="form-group {{ $errors->has( 'active' ) ? ' has-error' : '' }}">
                   <label for="active" class="control-label">Active</label>
                   <div class="switch" data-toggle="switch">
                       <label>Off <input type="checkbox" name="active" class="active" id="active" {{ ( !empty( $slider ) && !empty( $slider->active ) && ( $slider->active == 1 ) ) ? 'checked' : '' }} /><span class="toggle"></span> On</label>
                   </div>

                   @if ( $errors->has( 'active' ) )
                       <span class="help-block">
                           <strong>{{ $errors->first( 'active' ) }}</strong>
                       </span>
                   @endif
                </div>

                <!-- text input -->
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Name:</label>

                    <input id="name" type="name" class="form-control" name="name" value="{{ ( !empty( $slider ) && !empty( $slider->name ) ) ? $slider->name : '' }}" required>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info">Save</button>
              </div>
          </div>
          </form>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    @includeif( 'admin.slides.add' )

@endsection

@push('scripts')
<script src="{{ url( 'plugins/select2/select2.full.min.js' ) }}"></script>
@endpush

@push( 'custom-scripts' )

<script type="text/javascript" >

  $( '.select2' ).select2();

  $( '.remove_file' ).click( function(e) {
    $( '#remove_' + this.id ).val( 'true' );
    $( '#' + this.id + '_file' ).hide( "slow" );
  });

</script>
@endpush
