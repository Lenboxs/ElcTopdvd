<div class="panel panel-default panel-table">
    <div class="panel-heading">
        <div class="row">
            <div class="col col-xs-6">
                <h3 class="panel-title">Genres</h3>
            </div>
            <div class="col col-xs-6 text-right">
                <a href="{{ url( 'admin/add-genre#genres' ) }}" class="btn btn-success btn-sm">Add New Genre</a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
              <table id="genrestable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  @if( !empty( $genres ) )
                    @foreach( $genres as $genre )

                      <tr>
                        <td>{{ ( !empty( $genre ) && !empty( $genre->name ) ) ? $genre->name : '' }}</td>
                        <td>
                          <a href="{{ url( 'admin/edit-genre/' . $genre->id . "#genres" ) }}" class="btn btn-warning btn-sm">Edit</a>
                          <a href="{{ url( 'admin/delete-genre/' . $genre->id ) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>

                    @endforeach
                  @endif

                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
      </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="pull-right">

                    </div>
                </div>
            </div>
        </div>
      </div>
