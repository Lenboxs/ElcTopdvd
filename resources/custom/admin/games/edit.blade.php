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
              <h3 class="box-title">{{ !empty( $title ) ? $title : 'Edit Game' }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="{{ url( '/admin/update-movie' ) }}" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <input type="hidden" name="id" value="{{ ( !empty( $game ) && !empty( $game->id ) ) ? $game->id : '' }}" />
                <input type="hidden" name="remove_image" id="remove_image" value="false" />

                <div class="form-group {{ $errors->has( 'active' ) ? ' has-error' : '' }}">
                   <label for="active" class="control-label">Active</label>
                   <div class="switch" data-toggle="switch">
                       <label>Off <input type="checkbox" name="active" class="active" id="active" {{ ( !empty( $game ) && !empty( $game->active ) && ( $game->active == 1 ) ) ? 'checked' : '' }} /><span class="toggle"></span> On</label>
                   </div>

                   @if ( $errors->has( 'active' ) )
                       <span class="help-block">
                           <strong>{{ $errors->first( 'active' ) }}</strong>
                       </span>
                   @endif
                </div>

                <div class="form-group {{ $errors->has( 'new' ) ? ' has-error' : '' }}">
                   <label for="new" class="control-label">New</label>
                   <div class="switch" data-toggle="switch">
                       <label>Off <input type="checkbox" name="new" class="new" id="new" {{ ( !empty( $game ) && !empty( $game->new ) && ( $game->new == 1 ) ) ? 'checked' : '' }} /><span class="toggle"></span> On</label>
                   </div>

                   @if ( $errors->has( 'new' ) )
                       <span class="help-block">
                           <strong>{{ $errors->first( 'new' ) }}</strong>
                       </span>
                   @endif
                </div>

                <!-- text input -->
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Name:</label>

                    <input id="name" type="name" class="form-control" name="name" value="{{ ( !empty( $game ) && !empty( $game->name ) ) ? $game->name : '' }}" required>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="control-label">Description:</label>

                    <textarea id="description" class="form-control" rows="5" name="description">{{ ( !empty( $game ) && !empty( $game->description ) ) ? $game->description : '' }}</textarea>

                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has( 'image' ) ? ' has-error' : '' }}">
        					<label for="image" class="control-label">Image</label>
        					<input class="form-control" type="file" name="image" id="image" />
        					<br />
        					@if( !empty( $game->image ) )
        						<div id="image_file">
        							<img class="profile-image img-responsive" src="{{ !empty( $game->image ) ? url( 'img/games/' . $game->image ) : '' }}" width="100" />
        							<br /><a class="btn btn-danger remove_file" id="image"><i class="fa fa-trash-o"></i> Remove file</a>
        						</div>
        					@endif

        					@if ( $errors->has( 'image' ) )
        						<span class="help-block">
        							<strong>{{ $errors->first( 'image' ) }}</strong>
        						</span>
        					@endif
        				</div>

                <div class="form-group{{ $errors->has('trailerLink') ? ' has-error' : '' }}">
                    <label for="trailerLink" class="control-label">Trailer Link:</label>

                    <input type="text" id="trailerLink" class="form-control" rows="5" name="trailerLink" value="{{ ( !empty( $game ) && !empty( $game->trailerLink ) ) ? $game->trailerLink : '' }}" />

                    @if ($errors->has('trailerLink'))
                        <span class="help-block">
                            <strong>{{ $errors->first('trailerLink') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Year:</label>

                    <input id="year" type="number" class="form-control" name="year" value="{{ ( !empty( $game ) && !empty( $game->year ) ) ? $game->year : '' }}" required>

                    @if ($errors->has('year'))
                        <span class="help-block">
                            <strong>{{ $errors->first('year') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has( 'genres' ) ? ' has-error' : '' }}">
                    <label for="genres" class="control-label">Genres</label>
                    <select class="form-control select2 select-primary" name="genres[]" id="genres" multiple="multiple" data-placeholder="Select a Genre" style="width: 100%;">
                        @if( !empty( $genres ) )
                            @foreach( $genres as $genre )
                                <option value="{{ !empty( $genre->id ) ? $genre->id : '' }}"
                                @foreach( $game->genres as $game_genre )
                                    @if( $game_genre->id == $genre->id )
                                        selected
                                    @endif
                                @endforeach
                                >{{ !empty( $genre->name ) ? Ucfirst( $genre->name ) : '' }}</option>
                            @endforeach
                        @endif
                    </select>

                    @if ( $errors->has( 'genres' ) )
                        <span class="help-block">
                            <strong>{{ $errors->first( 'genres' ) }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has( 'branches' ) ? ' has-error' : '' }}">
                    <label for="branches" class="control-label">Branches</label>
                    <select class="form-control select2 select-primary" name="branches[]" id="branches" multiple="multiple" data-placeholder="Select a Branch" style="width: 100%;">
                        @if( !empty( $branches ) )
                            @foreach( $branches as $branch )
                                <option value="{{ !empty( $branch->id ) ? $branch->id : '' }}"
                                @foreach( $game->branches as $game_branch )
                                    @if( $game_branch->id == $branch->id )
                                        selected
                                    @endif
                                @endforeach
                                >{{ !empty( $branch->name ) ? Ucfirst( $branch->name ) : '' }}</option>
                            @endforeach
                        @endif
                    </select>

                    @if ( $errors->has( 'branches' ) )
                        <span class="help-block">
                            <strong>{{ $errors->first( 'branches' ) }}</strong>
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
