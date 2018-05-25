<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

        <div class="well">

          <form role="form" method="POST" action="{{ url( '/admin/update-branch' ) }}">
            <!-- text input -->

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Public Key</label>

                <input id="name" type="text" class="form-control" name="name" value="{{ ( !empty( $branch ) && !empty( $branch->name ) ) ? $branch->name : '' }}" required>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Private Key</label>

                <input id="name" type="text" class="form-control" name="name" value="{{ ( !empty( $branch ) && !empty( $branch->name ) ) ? $branch->name : '' }}" required>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
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
