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
              <h3 class="box-title">{{ !empty( $title ) ? $title : 'All Series' }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Active</th>
                  <th>Name</th>
                  <th>Season</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  @if( !empty( $series ) )
                    @foreach( $series as $serie )

                      <tr>
                        <td><h4>
                          @if( !empty( $serie ) && !empty( $serie->active ) && $serie->active == 1 )
                              <span class="label label-success">Active</span>
                          @else
                              <span class="label label-danger">Not Active</span>
                          @endif
                        </h4></td>
                        <td>{{ ( !empty( $serie ) && !empty( $serie->name ) ) ? $serie->name : '' }}</td>
                        <td>{{ ( !empty( $serie ) && !empty( $serie->season ) ) ? $serie->season : '' }}</td>
                        <td>
                          <a href="{{ url( 'admin/edit-series' ) }}" class="btn btn-warning btn-sm">Edit</a>
                          <a href="{{ url( 'admin/delete-series/' . $serie->id ) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>

                    @endforeach
                  @endif

                </tbody>
                <tfoot>
                <tr>
                  <th>Active</th>
                  <th>Name</th>
                  <th>Season</th>
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
