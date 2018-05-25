@extends( 'admin.layouts.admin' )

@section( 'title' )
{{ $title }}
@endsection

@push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css' ) }}">
@endpush

@section( 'content' )
<!-- Main content -->
    <section class="content">
<div class="row">
  <!-- left column -->
  <div class="col-md-12">

    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
        <li><a href="#social-media" data-toggle="tab">Social Media</a></li>
        <li><a href="#recaptcha" data-toggle="tab">Recaptcha</a></li>
        <li><a href="#branches" data-toggle="tab">Branches</a></li>
        <li><a href="#genres" data-toggle="tab">Genres</a></li>
        <li><a href="#types" data-toggle="tab">Types</a></li>
        <li><a href="#age-restrictions" data-toggle="tab">Age Restrictions</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="settings">
          <div class="row">
            <div class="col-md-12">

              <div class="well">
              <!-- form start -->
              <form role="form" method="POST" action="{{ url( '/admin/update-settings' ) }}" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="remove_logo" id="remove_logo" value="false" />

                  <div class="form-group {{ $errors->has( 'logo' ) ? ' has-error' : '' }}">
          					<label for="logo" class="control-label">Logo</label>
          					<input type="file" name="logo" id="logo" />

                    <p class="help-block">Choose the company logo.</p>

          					<br />
          					@if( !empty( $settings->logo ) )
          						<div id="logo_file">
          							<img class="profile-image img-responsive" src="{{ !empty( $settings->logo ) ? url( 'img/settings/' . $settings->logo ) : '' }}" width="200" />
          							<br /><a class="btn btn-danger remove_file" id="logo"><i class="fa fa-trash-o"></i> Remove file</a>
          						</div>
          					@endif

          					@if ( $errors->has( 'logo' ) )
          						<span class="help-block">
          							<strong>{{ $errors->first( 'logo' ) }}</strong>
          						</span>
          					@endif
          				</div>

                  <button type="submit" class="btn btn-primary">Save</button>
              </form>

            </div>

            </div>
          </div>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="social-media">
          <div class="row">
            <div class="col-md-12">

              <div class="well">

              <!-- form start -->
                <form role="form" method="POST" action="{{ url( '/admin/update-socialmedia' ) }}">

                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                  <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Facebook:</label>

                    <input id="facebook" type="text" class="form-control" name="facebook" value="{{ !empty( $socialmedia->facebook ) ? $socialmedia->facebook : '' }}" />

                    @if ($errors->has('facebook'))
                        <span class="help-block">
                            <strong>{{ $errors->first('facebook') }}</strong>
                        </span>
                    @endif
                  </div>

                  <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Twitter:</label>

                    <input id="twitter" type="text" class="form-control" name="twitter" value="{{ !empty( $socialmedia->twitter ) ? $socialmedia->twitter : '' }}" />

                    @if ($errors->has('twitter'))
                        <span class="help-block">
                            <strong>{{ $errors->first('twitter') }}</strong>
                        </span>
                    @endif
                  </div>

                  <div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Linked In:</label>

                    <input id="linkedin" type="text" class="form-control" name="linkedin" value="{{ !empty( $socialmedia->linkedin ) ? $socialmedia->linkedin : '' }}" />

                    @if ($errors->has('linkedin'))
                        <span class="help-block">
                            <strong>{{ $errors->first('linkedin') }}</strong>
                        </span>
                    @endif
                  </div>

                  <button type="submit" class="btn btn-primary">Save</button>
              </form>

            </div>

            </div>
          </div>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="recaptcha">
          <div class="row">
            <div class="col-md-12">
                @includeif( 'admin.recaptcha.edit' )
            </div>
          </div>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="branches">
          <div class="row">
            <div class="col-md-12">
                @if( Request::is( '*add-branch*' ) )
                    @includeif( 'admin.branches.add' )
                @elseif( Request::is( '*edit-branch*' ) )
                    @includeif( 'admin.branches.edit' )
                @else
                    @includeif( 'admin.branches.branches' )
                @endif
            </div>
          </div>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="genres">
          <div class="row">
            <div class="col-md-12">

                @if( Request::is( '*add-genre*' ) )
                    @includeif( 'admin.genres.add' )
                @elseif( Request::is( '*edit-genre*' ) )
                    @includeif( 'admin.genres.edit' )
                @else
                    @includeif( 'admin.genres.genres' )
                @endif

            </div>
          </div>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="types">
          <div class="row">
            <div class="col-md-12">

              @if( Request::is( '*add-type*' ) )
                  @includeif( 'admin.types.add' )
              @elseif( Request::is( '*edit-type*' ) )
                  @includeif( 'admin.types.edit' )
              @else
                  @includeif( 'admin.types.types' )
              @endif

            </div>
          </div>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="age-restrictions">
          <div class="row">
            <div class="col-md-12">

              @if( Request::is( '*add-age-restriction*' ) )
                  @includeif( 'admin.age-restrictions.add' )
              @elseif( Request::is( '*edit-age-restriction*' ) )
                  @includeif( 'admin.age-restrictions.edit' )
              @else
                  @includeif( 'admin.age-restrictions.age-restrictions' )
              @endif

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

@push('scripts')
<!-- DataTables -->
<script src="{{ asset( 'bower_components/datatables.net/js/jquery.dataTables.min.js' ) }}"></script>
<script src="{{ asset( 'bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js' ) }}"></script>
<!-- SlimScroll -->
<script src="{{ asset( 'bower_components/jquery-slimscroll/jquery.slimscroll.min.js' ) }}"></script>
<!-- FastClick -->
<script src="{{ asset( 'bower_components/fastclick/lib/fastclick.js' ) }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset( 'dist/js/adminlte.min.js' ) }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset( 'dist/js/demo.js' ) }}"></script>
@endpush

@push( 'custom-scripts' )
<script>
  $(function () {
    $( '#branchestable' ).DataTable();
    $( '#genrestable' ).DataTable();
    $( '#typestable' ).DataTable();
    $( '#agerestrictionstable' ).DataTable();
  })

  var url = document.location.toString();
  if (url.match('#')) {
      $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
  }

  // Change hash for page-reload
  $('.nav-tabs a').on('shown.bs.tab', function (e) {
      window.location.hash = e.target.hash;
  })

  $( '.remove_file' ).click( function(e) {
    $( '#remove_' + this.id ).val( 'true' );
    $( '#' + this.id + '_file' ).hide( "slow" );
  });
</script>
@endpush
