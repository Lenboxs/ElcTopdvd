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
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                    <i class="fa fa-search"></i>
                </button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="@if( Request::is( 'admin' ) || Request::is( 'admin/dashboard' ) ) active @endif">
          <a href="{{ url( 'admin' ) }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <!--span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span-->
          </a>
        </li>
        <li class="@if( Request::is( '*admin/home-page*' ) || Request::is( '*admin/top-ten*' ) || Request::is( '*admin/top-rated*' ) ) active @endif treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Manage Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if( Request::is( '*admin/home-page*' ) ) active @endif"><a href="{{ url( 'admin/home-page' ) }}"><i class="fa fa-circle-o"></i> Home Page</a></li>
            <li class="@if( Request::is( '*admin/top-ten*' ) ) active @endif"><a href="{{ url( 'admin/top-ten' ) }}"><i class="fa fa-circle-o"></i> Top Ten</a></li>
            <li class="@if( Request::is( '*admin/about-us*' ) ) active @endif"><a href="{{ url( 'admin/about-us' ) }}"><i class="fa fa-circle-o"></i> About Us</a></li>
            <!--li class="@if( Request::is( '*admin/top-rated*' ) ) active @endif"><a href="{{ url( 'admin/top-rated' ) }}"><i class="fa fa-circle-o"></i> Top Rated</a></li-->
          </ul>
        </li>
        <li class="@if( Request::is( '*movie*' ) ) active @endif treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Movies</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if( Request::is( '*admin/add-movie*' ) ) active @endif"><a href="{{ url( 'admin/add-movie' ) }}"><i class="fa fa-circle-o"></i> Add New Movie</a></li>
            <li class="@if( Request::is( '*admin/movies*' ) ) active @endif"><a href="{{ url( 'admin/movies' ) }}"><i class="fa fa-circle-o"></i> Manage Movies</a></li>
          </ul>
        </li>
        <li class="@if( Request::is( '*series*' ) ) active @endif treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Series</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if( Request::is( '*admin/add-series*' ) ) active @endif"><a href="{{ url( 'admin/add-series' ) }}"><i class="fa fa-circle-o"></i> Add New Series</a></li>
            <li class="@if( Request::is( '*admin/series*' ) ) active @endif"><a href="{{ url( 'admin/series' ) }}"><i class="fa fa-circle-o"></i> Manage Series</a></li>
          </ul>
        </li>
        <li class="@if( Request::is( '*game*' ) ) active @endif treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Games</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if( Request::is( '*admin/add-game*' ) ) active @endif"><a href="{{ url( 'admin/add-game' ) }}"><i class="fa fa-circle-o"></i> Add New Game</a></li>
            <li class="@if( Request::is( '*admin/games*' ) ) active @endif"><a href="{{ url( 'admin/games' ) }}"><i class="fa fa-circle-o"></i> Manage Games</a></li>
          </ul>
        </li>
        <li class="@if( Request::is( '*slider*' ) ) active @endif treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Sliders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if( Request::is( '*admin/add-slider*' ) ) active @endif"><a href="{{ url( 'admin/add-slider' ) }}"><i class="fa fa-circle-o"></i> Add New Slider</a></li>
            <li class="@if( Request::is( '*admin/sliders*' ) ) active @endif"><a href="{{ url( 'admin/sliders' ) }}"><i class="fa fa-circle-o"></i> Manage Sliders</a></li>
          </ul>
        </li>
        <li class="@if( Request::is( 'admin/manage-branches' ) ) active @endif">
          <a href="{{ url( 'admin/manage-branches' ) }}">
            <i class="fa fa-folder"></i>
            <span>Manage Branches</span>
          </a>
        </li>
        <li class="@if( Request::is( '*team*' ) ) active @endif treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Team</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if( Request::is( '*admin/add-team-member*' ) ) active @endif"><a href="{{ url( 'admin/add-team-member' ) }}"><i class="fa fa-circle-o"></i> Add New Member</a></li>
            <li class="@if( Request::is( '*admin/team*' ) ) active @endif"><a href="{{ url( 'admin/team' ) }}"><i class="fa fa-circle-o"></i> Manage Team</a></li>
          </ul>
        </li>
        <li class="@if( Request::is( '*user*' ) ) active @endif">
          <a href="{{ url( 'admin/users' ) }}">
            <i class="fa fa-users"></i> <span>Users</span>
          </a>
        </li>
        <li class="@if( Request::is( '*admin/settings*' ) ) active @endif">
          <a href="{{ url( 'admin/settings' ) }}">
            <i class="fa fa-cog"></i> <span>Settings</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
