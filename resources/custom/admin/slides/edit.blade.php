@extends( 'admin.layouts.admin' )

@section( 'title' )
{{ $title }}
@endsection

@section( 'content' )
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Slides</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <div class="well">
              <form role="form" method="POST" action="{{ url( '/admin/update-slide' ) }}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                  <input type="hidden" name="id" value="{{ ( !empty( $slide ) && !empty( $slide->id ) ) ? $slide->id : '' }}" />

                  <input type="hidden" name="slider_id" value="{{ ( !empty( $slider ) && !empty( $slider->id ) ) ? $slider->id : '' }}" />

                  <div class="form-group {{ $errors->has( 'active' ) ? ' has-error' : '' }}">
                     <label for="active" class="control-label">Active</label>
                     <div class="switch" data-toggle="switch">
                         <label>Off <input type="checkbox" name="active" class="active" id="active" {{ ( !empty( $slide ) && !empty( $slide->active ) && ( $slide->active == 1 ) ) ? 'checked' : '' }} /><span class="toggle"></span> On</label>
                     </div>

                     @if ( $errors->has( 'active' ) )
                         <span class="help-block">
                             <strong>{{ $errors->first( 'active' ) }}</strong>
                         </span>
                     @endif
                  </div>

                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="name" class="control-label">Name:</label>

                      <input id="name" type="name" class="form-control" name="name" value="{{ ( !empty( $slide ) && !empty( $slide->name ) ) ? $slide->name : '' }}">

                      @if ($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div class="form-group {{ $errors->has( 'image' ) ? ' has-error' : '' }}">
          					<label for="image" class="control-label">Slide Image</label>
          					<input class="form-control" type="file" name="image" id="image" />
          					<br />
          					@if( !empty( $slide->image ) )
          						<div id="image_file">
          							<img class="profile-image img-responsive" src="{{ !empty( $slide->image ) ? url( 'img/slides/' . $slide->image ) : '' }}" width="100" />
          							<br /><a class="btn btn-danger remove_file" id="image"><i class="fa fa-trash-o"></i> Remove file</a>
          						</div>
          					@endif

          					@if ( $errors->has( 'image' ) )
          						<span class="help-block">
          							<strong>{{ $errors->first( 'image' ) }}</strong>
          						</span>
          					@endif
          				</div>

                  <button type="submit" class="btn btn-info">Update</button>
              </form>
            </div>
            </div>
          </div>

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@push( 'custom-scripts' )

<script type="text/javascript" >

  $( '.remove_file' ).click( function(e) {
    $( '#remove_' + this.id ).val( 'true' );
    $( '#' + this.id + '_file' ).hide( "slow" );
  });

</script>
@endpush
