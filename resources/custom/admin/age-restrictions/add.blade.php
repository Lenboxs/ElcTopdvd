<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">


        <div class="well">

            <form role="form" method="POST" action="{{ url( '/admin/store-age-restriction' ) }}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div class="form-group {{ $errors->has( 'active' ) ? ' has-error' : '' }}">
               <label for="active" class="control-label">Active</label>
               <div class="switch" data-toggle="switch">
                   <label>Off <input type="checkbox" name="active" class="active" id="active" /><span class="toggle"></span> On</label>
               </div>

               @if ( $errors->has( 'active' ) )
                   <span class="help-block">
                       <strong>{{ $errors->first( 'active' ) }}</strong>
                   </span>
               @endif
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Name</label>

                <input id="name" type="name" class="form-control" name="name" required>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="well-footer">
                <button type="submit" class="btn btn-info">Save</button>
                <a href="{{ url( 'admin/settings#age-restrictions' ) }}" class="btn btn-info">Back</a>
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
