    <div class="panel panel-default panel-table">
        <div class="panel-heading">
            <div class="row">
                <div class="col col-xs-6">
                    <h3 class="panel-title">Branches</h3>
                </div>
                <div class="col col-xs-6 text-right">
                    <a href="{{ url( 'admin/add-branch#branches' ) }}" class="btn btn-success btn-sm">Add New Branch</a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                  <table id="branchestable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact Number</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                      @if( !empty( $branches ) )
                        @foreach( $branches as $branch )

                          <tr>
                            <td>{{ ( !empty( $branch ) && !empty($branch->name ) ) ? $branch->name : '' }}</td>
                            <td>{{ ( !empty( $branch ) && !empty($branch->email ) ) ? $branch->email : '' }}</td>
                            <td>{{ ( !empty( $branch ) && !empty($branch->contact_number ) ) ? $branch->contact_number : '' }}</td>
                            <td>
                              <a href="{{ url( 'admin/edit-branch/' . $branch->id . "#branches" ) }}" class="btn btn-warning btn-sm">Edit</a>
                              <a href="{{ url( 'admin/delete-branch/' . $branch->id ) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                          </tr>

                        @endforeach
                      @endif

                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact Number</th>
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
