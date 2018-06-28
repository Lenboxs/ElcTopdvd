<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Slides</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="well">
                  @if( !empty( $slides ) )
                      @foreach( $slides as $slide )
                          <div class="slide-thumbnail">
                            <a class="drag-slide">
                              <i class="fa fa-arrows" aria-hidden="true"></i>
                            </a>
                            <a href="{{ url( 'admin/edit-slide/' . $slide->id ) }}" class="edit-slide">
                              <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a href="{{ url( 'admin/delete-slide/' . $slide->id ) }}" class="delete-slide">
                              <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                              <img src="{{ asset( 'img/slides/' . $slide->image ) }}" class="thumbnail" />

                          </div>
                      @endforeach
                  @endif
              </div>
              <div class="well">
              <form role="form" method="POST" action="{{ url( '/admin/store-slide' ) }}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                  <input type="hidden" name="slider_id" value="{{ ( !empty( $slider ) && !empty( $slider->id ) ) ? $slider->id : '' }}" />

                  <div class="form-group {{ $errors->has( 'active' ) ? ' has-error' : '' }}">
                     <label for="active" class="control-label">Active</label>
                     <div class="switch" data-toggle="switch">
                         <label>Off <input type="checkbox" name="active" class="active" id="active" /><span class="toggle"></span> On</label>
                     </div>

                     @if ( $errors->has( 'active' ) )
                         <span class="help-block">
                             <strong>{{ $errors->first( 'active' ) }}</strong>
                         </span>
                     @endif
                  </div>

                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="name" class="control-label">Name:</label>

                      <input id="name" type="name" class="form-control" name="name">

                      @if ($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                      <label for="image" class="control-label">Slide Image:</label>

                      <div class="file"><input class="form-control" type="file" name="image" id="image" /></div>

                      @if ($errors->has('image'))
                          <span class="help-block">
                              <strong>{{ $errors->first('image') }}</strong>
                          </span>
                      @endif
                  </div>

                  <button type="submit" class="btn btn-info">Upload</button>
              </form>
            </div>
            </div>
          </div>

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
