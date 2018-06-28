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
              <h3 class="box-title">{{ !empty( $title ) ? $title : 'All Branches' }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  @if( !empty( $branches ) )
                    @foreach( $branches as $branch )

                      <tr>
                        <td>{{ ( !empty( $branch ) && !empty($branch->name ) ) ? $branch->name : '' }}</td>
                        <td>
                          <a href="{{ url( 'admin/manage-branch/' . $branch->id ) }}" class="btn btn-warning btn-sm">Manage</a>
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
@endpush

@push( 'custom-scripts' )
<script>
  $(function () {
    $( '#example1' ).DataTable()
  })
</script>
@endpush
