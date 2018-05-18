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

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"> <i class="fa fa-cog"></i> Settings</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputFile">Logo</label>
            <input type="file" id="exampleInputFile">

            <p class="help-block">Choose the company logo.</p>
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<section>
@endsection
