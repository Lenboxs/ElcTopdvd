<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">


        <div class="well">

            <form role="form" method="POST" action="{{ url( '/admin/store-genre' ) }}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

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
                <a href="{{ url( 'admin/settings#genres' ) }}" class="btn btn-info">Back</a>
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
