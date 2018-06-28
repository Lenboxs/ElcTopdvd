@extends( 'admin.layouts.admin' )

@section( 'title' )
{{ $title }}
@endsection

@push('styles')
<!-- Morris.js charts -->
<link rel="stylesheet" href="{{ url( 'plugins/select2/select2.css' ) }}">
@endpush

@section( 'content' )

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">{{ !empty( $title ) ? $title : 'Manage Movie Types' }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="{{ url( '/admin/update-movie' ) }}" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <input type="hidden" name="id" value="{{ ( !empty( $movie ) && !empty( $movie->id ) ) ? $movie->id : '' }}" />

                <div class="form-group {{ $errors->has( 'types' ) ? ' has-error' : '' }}">
                    <label for="types" class="control-label">Types</label>
                    <select class="form-control select2 select-primary" name="types[]" id="types" multiple="multiple" data-placeholder="Select a Type" style="width: 100%;">
                        @if( !empty( $types ) )
                            @foreach( $types as $type )
                                <option value="{{ !empty( $type->id ) ? $type->id : '' }}"
                                @foreach( $movie->types as $movie_type )
                                    @if( $movie_type->id == $type->id )
                                        selected
                                    @endif
                                @endforeach
                                >{{ !empty( $type->name ) ? Ucfirst( $type->name ) : '' }}</option>
                            @endforeach
                        @endif
                    </select>

                    @if ( $errors->has( 'types' ) )
                        <span class="help-block">
                            <strong>{{ $errors->first( 'types' ) }}</strong>
                        </span>
                    @endif
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info">Save</button>
              </div>
          </div>
          </form>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection

@push('scripts')
<script src="{{ url( 'plugins/select2/select2.full.min.js' ) }}"></script>
@endpush

@push( 'custom-scripts' )

<script type="text/javascript" >

  $( '.select2' ).select2();

  $( '.remove_file' ).click( function(e) {
    $( '#remove_' + this.id ).val( 'true' );
    $( '#' + this.id + '_file' ).hide( "slow" );
  });

</script>
@endpush
