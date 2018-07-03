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
              <h3 class="box-title">{{ !empty( $title ) ? $title : 'Edit Team Member' }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="{{ url( '/admin/update-team-member' ) }}" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <input type="hidden" name="id" value="{{ ( !empty( $staff ) && !empty( $staff->id ) ) ? $staff->id : '' }}" />
                <input type="hidden" name="remove_image" id="remove_image" value="false" />

                <div class="form-group {{ $errors->has( 'active' ) ? ' has-error' : '' }}">
                   <label for="active" class="control-label">Active</label>
                   <div class="switch" data-toggle="switch">
                       <label>Off <input type="checkbox" name="active" class="active" id="active" {{ ( !empty( $staff ) && !empty( $staff->active ) && ( $staff->active == 1 ) ) ? 'checked' : '' }} /><span class="toggle"></span> On</label>
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

                    <input id="name" type="text" class="form-control" name="name" value="{{ ( !empty( $staff ) && !empty( $staff->name ) ) ? $staff->name : '' }}" required>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                    <label for="position" class="control-label">Position:</label>

                    <textarea id="position" class="form-control" rows="5" name="position">{{ ( !empty( $staff ) && !empty( $staff->position ) ) ? $staff->position : '' }}</textarea>

                    @if ($errors->has('position'))
                        <span class="help-block">
                            <strong>{{ $errors->first('position') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has( 'image' ) ? ' has-error' : '' }}">
        					<label for="image" class="control-label">Image</label>
        					<input class="form-control" type="file" name="image" id="image" />
        					<br />
        					@if( !empty( $staff->image ) )
        						<div id="image_file">
        							<img class="profile-image img-responsive" src="{{ !empty( $staff->image ) ? url( 'img/staff/' . $staff->image ) : '' }}" width="100" />
        							<br /><a class="btn btn-danger remove_file" id="image"><i class="fa fa-trash-o"></i> Remove file</a>
        						</div>
        					@endif

        					@if ( $errors->has( 'image' ) )
        						<span class="help-block">
        							<strong>{{ $errors->first( 'image' ) }}</strong>
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

@endsection

@push( 'custom-scripts' )

<script type="text/javascript" >

  $( '.select2' ).select2();

  $( '.remove_file' ).click( function(e) {
    $( '#remove_' + this.id ).val( 'true' );
    $( '#' + this.id + '_file' ).hide( "slow" );
  });

</script>
@endpush
