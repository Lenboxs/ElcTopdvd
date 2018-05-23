@extends( 'admin.layouts.admin' )

@section( 'title' )
{{ $title }}
@endsection

@section( 'content' )
<!-- Main content -->
    <section class="content">
<div class="row">
  <!-- left column -->
  <div class="col-md-12">



    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Settings</a></li>
        <li><a href="#tab_2" data-toggle="tab">Social Media</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <div class="row">
            <div class="col-md-12">
              <!-- form start -->
              <form role="form">
                  <div class="form-group">
                    <label for="exampleInputFile">Logo</label>
                    <input type="file" id="logo">

                    <p class="help-block">Choose the company logo.</p>
                  </div>

                  <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
          <div class="row">
            <div class="col-md-12">
              <!-- form start -->
              <form role="form">
                  <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Facebook:</label>

                    <input id="facebook" type="text" class="form-control" name="facebook" required>

                    @if ($errors->has('facebook'))
                        <span class="help-block">
                            <strong>{{ $errors->first('facebook') }}</strong>
                        </span>
                    @endif
                  </div>

                  <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->

  </div>
</div>
<section>
@endsection
