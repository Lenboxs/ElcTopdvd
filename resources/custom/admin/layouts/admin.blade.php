<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield( 'title' )</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset( 'bower_components/bootstrap/dist/css/bootstrap.min.css' ) }}">
  <link rel="stylesheet" href="{{ asset( 'css/b3scr.css' ) }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset( 'bower_components/font-awesome/css/font-awesome.min.css' ) }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset( 'bower_components/Ionicons/css/ionicons.min.css' ) }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset( 'css/AdminLTE.min.css' ) }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset( 'css/skins/_all-skins.min.css' ) }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset( 'bower_components/morris.js/morris.css' ) }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset( 'bower_components/jvectormap/jquery-jvectormap.css' ) }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset( 'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' ) }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset( 'bower_components/bootstrap-daterangepicker/daterangepicker.css' ) }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset( 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css' ) }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet'>
@stack( 'styles' )

</head>
<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

    <div class="flash-message">
      @foreach( ['danger', 'warning', 'success', 'info'] as $msg )
        @if( Session::has( 'alert-' . $msg ) )

          @foreach( Session::get( 'alert-' . $msg ) as $alert )

            <div class="alert alert-{{ $msg }}">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;
              </button>
              {{ $alert }}
            </div>

          @endforeach

        @endif

        {{ Session::forget( 'alert-' . $msg ) }}

      @endforeach
    </div>
    <!-- /flash-message -->

    @includeif( 'admin.sections.header' )

    @includeif( 'admin.sections.aside' )

    <div class="content-wrapper">
      @yield( 'content' )
    </div>

    @includeif( 'admin.sections.footer' )
  </div>

<!-- jQuery 3 -->
<script src="{{ asset( 'bower_components/jquery/dist/jquery.min.js' ) }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset( 'bower_components/jquery-ui/jquery-ui.min.js' ) }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset( 'bower_components/bootstrap/dist/js/bootstrap.min.js' ) }}"></script>
<!-- Sparkline -->
<script src="{{ asset( 'bower_components/jquery-sparkline/dist/jquery.sparkline.min.js' ) }}"></script>
<!-- daterangepicker -->
<script src="{{ asset( 'bower_components/moment/min/moment.min.js' ) }}"></script>
<script src="{{ asset( 'bower_components/bootstrap-daterangepicker/daterangepicker.js' ) }}"></script>
<!-- datepicker -->
<script src="{{ asset( 'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' ) }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset( 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js' ) }}"></script>
<!-- Slimscroll -->
<script src="{{ asset( 'bower_components/jquery-slimscroll/jquery.slimscroll.min.js' ) }}"></script>
<!-- FastClick -->
<script src="{{ asset( 'bower_components/fastclick/lib/fastclick.js' ) }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset( 'js/adminlte.min.js' ) }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset( 'js/demo.js' ) }}"></script>

@stack( 'scripts' )

@stack( 'custom-scripts' )

@include('flashy::message')

</body>
</html>
