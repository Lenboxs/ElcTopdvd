<div class="panel panel-default panel-table">
    <div class="panel-heading">
        <div class="row">
            <div class="col col-xs-6">
                <h3 class="panel-title">Consoles</h3>
            </div>
            <div class="col col-xs-6 text-right">
                <a href="{{ url( 'admin/add-console#consoles' ) }}" class="btn btn-success btn-sm">Add New Console</a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
              <table id="consolestable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Active</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  @if( !empty( $consoles ) )
                    @foreach( $consoles as $console )

                      <tr>
                        <td><h4>
                          @if( !empty( $console ) && !empty( $console->active ) && $console->active == 1 )
                              <span class="label label-success">Active</span>
                          @else
                              <span class="label label-danger">Not Active</span>
                          @endif
                        </h4></td>
                        <td>{{ ( !empty( $console ) && !empty( $console->name ) ) ? $console->name : '' }}</td>
                        <td>
                          <a href="{{ url( 'admin/edit-console/' . $console->id . "#consoles" ) }}" class="btn btn-warning btn-sm">Edit</a>
                          <a href="{{ url( 'admin/delete-console/' . $console->id ) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>

                    @endforeach
                  @endif

                </tbody>
                <tfoot>
                <tr>
                  <th>Active</th>
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
