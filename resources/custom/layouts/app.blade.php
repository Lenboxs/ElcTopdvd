<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield( 'title', 'Top DVD' )</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="{{ asset('fonts/EricaOne-Regular.ttf') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId            : 'your-app-id',
          autoLogAppEvents : true,
          xfbml            : true,
          version          : 'v3.0'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "https://connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
    @stack( 'styles' )
</head>
<body class="bg-dark">
    <div id="app">

		    @includeif( 'section.nav' )

        @yield( 'template' )

    </div>

    <!-- Scripts -->
    <script src="{{ asset( 'js/app.js' ) }}"></script>

    @stack( 'scripts' )

    @stack( 'custom-scripts' )
</body>
</html>
