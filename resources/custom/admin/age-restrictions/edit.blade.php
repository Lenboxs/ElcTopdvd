age-restrictions<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

        <div class="well">

          <form role="form" method="POST" action="{{ url( '/admin/update-age-restriction' ) }}">
            <!-- text input -->

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <input type="hidden" name="id" value="{{ ( !empty( $agerestriction ) && !empty( $agerestriction->id ) ) ? $agerestriction->id : '' }}" />

            <div class="form-group {{ $errors->has( 'active' ) ? ' has-error' : '' }}">
               <label for="active" class="control-label">Active</label>
               <div class="switch" data-toggle="switch">
                   <label>Off <input type="checkbox" name="active" class="active" id="active" {{ ( !empty( $agerestriction ) && !empty( $agerestriction->active ) && ( $agerestriction->active == 1 ) ) ? 'checked' : '' }} /><span class="toggle"></span> On</label>
               </div>

               @if ( $errors->has( 'active' ) )
                   <span class="help-block">
                       <strong>{{ $errors->first( 'active' ) }}</strong>
                   </span>
               @endif
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Name</label>

                <input id="name" type="text" class="form-control" name="name" value="{{ ( !empty( $agerestriction ) && !empty( $agerestriction->name ) ) ? $agerestriction->name : '' }}" required>

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

    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
