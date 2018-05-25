<div class="panel panel-default panel-table">
    <div class="panel-heading">
        <div class="row">
            <div class="col col-xs-6">
                <h3 class="panel-title">Types</h3>
            </div>
            <div class="col col-xs-6 text-right">
                <a href="{{ url( 'admin/add-type#types' ) }}" class="btn btn-success btn-sm">Add New Type</a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
              <table id="typestable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  @if( !empty( $types ) )
                    @foreach( $types as $type )

                      <tr>
                        <td>{{ ( !empty( $type ) && !empty( $type->name ) ) ? $type->name : '' }}</td>
                        <td>
                          <a href="{{ url( 'admin/edit-type/' . $type->id . "#types" ) }}" class="btn btn-warning btn-sm">Edit</a>
                          <a href="{{ url( 'admin/delete-type/' . $type->id ) }}" class="btn btn-sm btn-danger">Delete</a>
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
