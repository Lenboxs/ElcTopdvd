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
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Branches</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact Number</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Courtenay St</td>
                    <td>info@topdvd.co.za</td>
                    <td>083 410 1808</td>
                    <td><a href="{{ url( 'admin/edit-branch' ) }}" class="btn btn-warning btn-sm">Edit</a> <a href="{{ url( 'admin/delete-branch/1' ) }}" class="btn btn-sm btn-danger">Delete</a></td>
                  </tr>
                  <tr>
                    <td>St. Georges Sq</td>
                    <td>info@topdvd.co.za</td>
                    <td>083 296 7545</td>
                    <td><a href="{{ url( 'admin/edit-branch' ) }}" class="btn btn-warning btn-sm">Edit</a> <a href="{{ url( 'admin/delete-branch/1' ) }}" class="btn btn-sm btn-danger">Delete</a></td>
                  </tr>
                  <tr>
                    <td>Heather Park</td>
                    <td>info@topdvd.co.za</td>
                    <td>079 527 2717</td>
                    <td><a href="{{ url( 'admin/edit-branch' ) }}" class="btn btn-warning btn-sm">Edit</a> <a href="{{ url( 'admin/delete-branch/1' ) }}" class="btn btn-sm btn-danger">Delete</a></td>
                  </tr>
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

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
    $( '#example1' ).DataTable()
  })
</script>
@endpush
