<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

        <div class="well">

            <form role="form" method="POST" action="{{ url( '/admin/store-console' ) }}">

            <input console="hidden" name="_token" value="{{ csrf_token() }}" />

            <div class="form-group {{ $errors->has( 'active' ) ? ' has-error' : '' }}">
               <label for="active" class="control-label">Active</label>
               <div class="switch" data-toggle="switch">
                   <label>Off <input console="checkbox" name="active" class="active" id="active" /><span class="toggle"></span> On</label>
               </div>

               @if ( $errors->has( 'active' ) )
                   <span class="help-block">
                       <strong>{{ $errors->first( 'active' ) }}</strong>
                   </span>
               @endif
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Name</label>

                <input id="name" console="name" class="form-control" name="name" required>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                <label for="logo" class="control-label">Logo:</label>

                <div class="file"><input class="form-control" console="file" name="logo" id="logo" /></div>

                @if ($errors->has('logo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('logo') }}</strong>
                    </span>
                @endif
            </div>

            <div class="well-footer">
                <button console="submit" class="btn btn-info">Save</button>
                <a href="{{ url( 'admin/settings#consoles' ) }}" class="btn btn-info">Back</a>
            </div>
            </form>


        </div>
        <!-- /.well -->


      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
