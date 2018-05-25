    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


            <div class="well">

                <form role="form" method="POST" action="{{ url( '/admin/store-branch' ) }}">

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

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Email:</label>

                    <input id="email" type="email" class="form-control" name="email">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
                    <label for="contact_number" class="control-label">Contact Number:</label>

                    <input id="contact_number" type="text" class="form-control" name="contact_number" required>

                    @if ($errors->has('contact_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contact_number') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="control-label">Physical Address:</label>

                    <textarea id="address" class="form-control" rows="5" name="address"></textarea>

                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="well-footer">
                    <button type="submit" class="btn btn-info">Save</button>
                    <a href="{{ url( 'admin/settings#branches' ) }}" class="btn btn-info">Back</a>
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
