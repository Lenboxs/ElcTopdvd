<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

        <div class="well">

          <form role="form" method="POST" action="{{ url( '/admin/update-type' ) }}"  enctype="multipart/form-data">
            <!-- text input -->

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <input type="hidden" name="id" value="{{ ( !empty( $type ) && !empty( $type->id ) ) ? $type->id : '' }}" />

            <div class="form-group {{ $errors->has( 'active' ) ? ' has-error' : '' }}">
               <label for="active" class="control-label">Active</label>
               <div class="switch" data-toggle="switch">
                   <label>Off <input type="checkbox" name="active" class="active" id="active" {{ ( !empty( $type ) && !empty( $type->active ) && ( $type->active == 1 ) ) ? 'checked' : '' }} /><span class="toggle"></span> On</label>
               </div>

               @if ( $errors->has( 'active' ) )
                   <span class="help-block">
                       <strong>{{ $errors->first( 'active' ) }}</strong>
                   </span>
               @endif
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Name</label>

                <input id="name" type="text" class="form-control" name="name" value="{{ ( !empty( $type ) && !empty( $type->name ) ) ? $type->name : '' }}" required>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has( 'logo' ) ? ' has-error' : '' }}">
              <label for="logo" class="control-label">Logo</label>
              <input class="form-control" type="file" name="logo" id="logo" />
              <br />
              @if( !empty( $type->logo ) )
                <div id="logo_file">
                  <img class="profile-logo img-responsive" src="{{ !empty( $type->logo ) ? url( 'img/types/' . $type->logo ) : '' }}" width="100" />
                  <br /><a class="btn btn-danger remove_file" id="logo"><i class="fa fa-trash-o"></i> Remove file</a>
                </div>
              @endif

              @if ( $errors->has( 'logo' ) )
                <span class="help-block">
                  <strong>{{ $errors->first( 'logo' ) }}</strong>
                </span>
              @endif
            </div>

            <div class="well-footer">
                <button type="submit" class="btn btn-info">Save</button>
                <a href="{{ url( 'admin/settings#types' ) }}" class="btn btn-info">Back</a>
            </div>

            </form>


        </div>
        <!-- /.well -->

    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
