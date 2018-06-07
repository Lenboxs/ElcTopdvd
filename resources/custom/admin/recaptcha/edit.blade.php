<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

        <div class="well">

          <form role="form" method="POST" action="{{ url( '/admin/update-recaptcha' ) }}">
            <!-- text input -->

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div class="form-group{{ $errors->has('public_key') ? ' has-error' : '' }}">
                <label for="public_key" class="control-label">Site Key</label>

                <input id="public_key" type="text" class="form-control" name="public_key" value="{{ ( !empty( $recaptcha ) && !empty( $recaptcha->public_key ) ) ? $recaptcha->public_key : '' }}" required>

                @if( $errors->has( 'public_key' ) )
                    <span class="help-block">
                        <strong>{{ $errors->first( 'public_key' ) }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has( 'private_key' ) ? ' has-error' : '' }}">
                <label for="private_key" class="control-label">Secret Key</label>

                <input id="private_key" type="text" class="form-control" name="private_key" value="{{ ( !empty( $recaptcha ) && !empty( $recaptcha->private_key ) ) ? $recaptcha->private_key : '' }}" required>

                @if( $errors->has( 'private_key' ) )
                    <span class="help-block">
                        <strong>{{ $errors->first( 'private_key' ) }}</strong>
                    </span>
                @endif
            </div>

            <div class="well-footer">
                <button type="submit" class="btn btn-info">Save</button>
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
