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
        <h3 class="box-title"> <i class="fa fa-cog"></i> Manage Home Page</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="{{ url( '/admin/update-homepage' ) }}" method="post">
        <div class="box-body">

          <input type="hidden" name="_token" value="{{ csrf_token() }}" />

          <div class="form-group {{ $errors->has( 'slider' ) ? ' has-error' : '' }}">
              <label for="slider" class="control-label">Slider</label>
              <select class="form-control select-primary" name="slider" id="slider">
                  <option value="">Select a Slider</option>
                  @if( !empty( $sliders ) )
                      @foreach( $sliders as $slider )
                          <option value="{{ !empty( $slider->id ) ? $slider->id : '' }}"
                              @if( $homepage->slider_id == $slider->id )
                                  selected
                              @endif
                          >{{ !empty( $slider->name ) ? Ucfirst( $slider->name ) : '' }}</option>
                      @endforeach
                  @endif
              </select>

              @if ( $errors->has( 'slider' ) )
                  <span class="help-block">
                      <strong>{{ $errors->first( 'slider' ) }}</strong>
                  </span>
              @endif
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
