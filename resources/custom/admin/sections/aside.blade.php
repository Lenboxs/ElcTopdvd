<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset( 'img/profiles/default.png' ) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="{{ url( 'admin' ) }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <!--span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span-->
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Manage Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url( 'admin/home-page' ) }}"><i class="fa fa-circle-o"></i> Home Page</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Top Ten</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Top Rated</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Movies</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url( 'admin/add-movie' ) }}"><i class="fa fa-circle-o"></i> Add New Movie</a></li>
            <li><a href="{{ url( 'admin/movies' ) }}"><i class="fa fa-circle-o"></i> Manage Movies</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Series</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url( 'admin/add-series' ) }}"><i class="fa fa-circle-o"></i> Add New Series</a></li>
            <li><a href="{{ url( 'admin/series' ) }}"><i class="fa fa-circle-o"></i> Manage Series</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Branches</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url( 'admin/add-branch' ) }}"><i class="fa fa-circle-o"></i> Add New Branch</a></li>
            <li><a href="{{ url( 'admin/branches' ) }}"><i class="fa fa-circle-o"></i> Manage Branches</a></li>
          </ul>
        </li>
        <li class="">
          <a href="{{ url( 'admin/settings' ) }}">
            <i class="fa fa-cog"></i> <span>Settings</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
