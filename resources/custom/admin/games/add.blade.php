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
              <h3 class="box-title">{{ !empty( $title ) ? $title : 'Add New Game' }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="{{ url( '/admin/store-game' ) }}" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

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

                <div class="form-group {{ $errors->has( 'new' ) ? ' has-error' : '' }}">
                   <label for="new" class="control-label">New</label>
                   <div class="switch" data-toggle="switch">
                       <label>Off <input type="checkbox" name="new" class="new" id="new" /><span class="toggle"></span> On</label>
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

                    <input id="name" type="text" class="form-control" name="name" required>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="control-label">Description:</label>

                    <textarea id="description" class="form-control" rows="5" name="description"></textarea>

                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image" class="control-label">Image:</label>

                    <div class="file"><input class="form-control" type="file" name="image" id="image" /></div>

                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('trailerLink') ? ' has-error' : '' }}">
                    <label for="trailerLink" class="control-label">Trailer Link:</label>

                    <input type="text" id="trailerLink" class="form-control" rows="5" name="trailerLink" />

                    @if ($errors->has('trailerLink'))
                        <span class="help-block">
                            <strong>{{ $errors->first('trailerLink') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                    <label for="year" class="control-label">Year:</label>

                    <input id="year" type="number" class="form-control" name="year" required>

                    @if ($errors->has('year'))
                        <span class="help-block">
                            <strong>{{ $errors->first('year') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has( 'agerestriction_id' ) ? ' has-error' : '' }}">
                    <label for="agerestriction_id" class="control-label">Age Restrictions</label>
                    <select class="form-control select-primary" name="agerestriction_id" id="agerestriction_id">
                        <option value="">Select an Age Restriction</option>
                        @if( !empty( $agerestrictions ) )
                            @foreach( $agerestrictions as $agerestriction )
                                <option value="{{ !empty( $agerestriction->id ) ? $agerestriction->id : '' }}"
                                >{{ !empty( $agerestriction->name ) ? Ucfirst( $agerestriction->name ) : '' }}</option>
                            @endforeach
                        @endif
                    </select>

                    @if ( $errors->has( 'agerestriction_id' ) )
                        <span class="help-block">
                            <strong>{{ $errors->first( 'agerestriction_id' ) }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has( 'genres' ) ? ' has-error' : '' }}">
                    <label for="genres" class="control-label">Genres</label>
                    <select class="form-control select2 select-primary" name="genres[]" id="genres" multiple="multiple" data-placeholder="Select a Genre" style="width: 100%;">
                        @if( !empty( $genres ) )
                            @foreach( $genres as $genre )
                                <option value="{{ !empty( $genre->id ) ? $genre->id : '' }}">{{ !empty( $genre->name ) ? Ucfirst( $genre->name ) : '' }}</option>
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
                                <option value="{{ !empty( $branch->id ) ? $branch->id : '' }}">{{ !empty( $branch->name ) ? Ucfirst( $branch->name ) : '' }}</option>
                            @endforeach
                        @endif
                    </select>

                    @if ( $errors->has( 'branches' ) )
                        <span class="help-block">
                            <strong>{{ $errors->first( 'branches' ) }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has( 'consoles' ) ? ' has-error' : '' }}">
                    <label for="consoles" class="control-label">Consoles</label>
                    <select class="form-control select2 select-primary" name="consoles[]" id="consolesconsoles" multiple="multiple" data-placeholder="Select a Console" style="width: 100%;">
                        @if( !empty( $consoles ) )
                            @foreach( $consoles as $console )
                                <option value="{{ !empty( $console->id ) ? $console->id : '' }}">{{ !empty( $console->name ) ? Ucfirst( $console->name ) : '' }}</option>
                            @endforeach
                        @endif
                    </select>

                    @if ( $errors->has( 'console' ) )
                        <span class="help-block">
                            <strong>{{ $errors->first( 'console' ) }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has( 'agerestriction' ) ? ' has-error' : '' }}">
                    <label for="agerestriction" class="control-label">Age Restriction</label>
                    <select class="form-control select-primary" name="agerestriction" id="agerestriction" data-placeholder="Select an Age Restriction" style="width: 100%;">
                        @if( !empty( $agerestrictions ) )
                            @foreach( $agerestrictions as $agerestriction )
                                <option value="{{ !empty( $agerestriction->id ) ? $agerestriction->id : '' }}">{{ !empty( $agerestriction->name ) ? Ucfirst( $agerestriction->name ) : '' }}</option>
                            @endforeach
                        @endif
                    </select>

                    @if ( $errors->has( 'agerestriction' ) )
                        <span class="help-block">
                            <strong>{{ $errors->first( 'agerestriction' ) }}</strong>
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
</script>
@endpush
