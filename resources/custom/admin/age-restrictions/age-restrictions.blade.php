<div class="panel panel-default panel-table">
    <div class="panel-heading">
        <div class="row">
            <div class="col col-xs-6">
                <h3 class="panel-title">Age Restrictions</h3>
            </div>
            <div class="col col-xs-6 text-right">
                <a href="{{ url( 'admin/add-age-restriction#age-restrictions' ) }}" class="btn btn-success btn-sm">Add New Age Restriction</a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
              <table id="agerestrictionstable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  @if( !empty( $agerestrictions ) )
                    @foreach( $agerestrictions as $agerestriction )

                      <tr>
                        <td>{{ ( !empty( $agerestriction ) && !empty( $agerestriction->name ) ) ? $agerestriction->name : '' }}</td>
                        <td>
                          <a href="{{ url( 'admin/edit-age-restriction/' . $agerestriction->id . "#age-restrictions" ) }}" class="btn btn-warning btn-sm">Edit</a>
                          <a href="{{ url( 'admin/delete-age-restriction/' . $agerestriction->id ) }}" class="btn btn-sm btn-danger">Delete</a>
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
