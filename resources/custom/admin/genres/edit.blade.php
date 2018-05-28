<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

        <div class="well">

          <form role="form" method="POST" action="{{ url( '/admin/update-genre' ) }}">
            <!-- text input -->

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <input type="hidden" name="id" value="{{ ( !empty( $genre ) && !empty( $genre->id ) ) ? $genre->id : '' }}" />

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Name</label>

                <input id="name" type="text" class="form-control" name="name" value="{{ ( !empty( $genre ) && !empty( $genre->name ) ) ? $genre->name : '' }}" required>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="well-footer">
                <button type="submit" class="btn btn-info">Save</button>
                <a href="{{ url( 'admin/settings#genres' ) }}" class="btn btn-info">Back</a>
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
