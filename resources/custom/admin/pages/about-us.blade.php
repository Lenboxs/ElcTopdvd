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
        <h3 class="box-title"> <i class="fa fa-cog"></i> Manage About Us Page</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="{{ url( '/admin/update-about-us' ) }}" method="post">
        <div class="box-body">

          <input type="hidden" name="_token" value="{{ csrf_token() }}" />

          <input type="hidden" name="id" value="{{ ( !empty( $page ) && !empty( $page->id ) ) ? $page->id : '' }}" />

          <div class="form-group {{ $errors->has( 'active' ) ? ' has-error' : '' }}">
             <label for="active" class="control-label">Active</label>
             <div class="switch" data-toggle="switch">
                 <label>Off <input type="checkbox" name="active" class="active" id="active" {{ ( !empty( $page ) && !empty( $page->active ) && ( $page->active == 1 ) ) ? 'checked' : '' }} /><span class="toggle"></span> On</label>
             </div>

             @if ( $errors->has( 'active' ) )
                 <span class="help-block">
                     <strong>{{ $errors->first( 'active' ) }}</strong>
                 </span>
             @endif
          </div>

          <div class="form-group{{ $errors->has('heading') ? ' has-error' : '' }}">
              <label for="heading" class="control-label">Name:</label>

              <input id="heading" type="text" class="form-control" name="heading" value="{{ ( !empty( $page ) && !empty( $page->heading ) ) ? $page->heading : '' }}" required>

              @if ($errors->has('heading'))
                  <span class="help-block">
                      <strong>{{ $errors->first('heading') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
              <label for="body" class="control-label">Body:</label>

              <textarea id="body" class="form-control" rows="5" name="body">{{ ( !empty( $page ) && !empty( $page->body ) ) ? $page->body : '' }}</textarea>

              @if ($errors->has('body'))
                  <span class="help-block">
                      <strong>{{ $errors->first('body') }}</strong>
                  </span>
              @endif
          </div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-info">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<section>
@endsection
