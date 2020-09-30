<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('metronic') }}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('metronic') }}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('metronic') }}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('metronic') }}/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{ asset('metronic') }}/assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="{{ asset('metronic') }}/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{ asset('metronic') }}/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('metronic') }}/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('metronic') }}/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{ asset('metronic') }}/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
@stack('css')
</head>

<body class="login">
       
     @yield('content')
</body>

<script src="{{ asset('metronic') }}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('metronic') }}/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="{{ asset('metronic') }}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('metronic') }}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{ asset('metronic') }}/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="{{ asset('metronic') }}/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('metronic') }}/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('metronic') }}/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{ asset('metronic') }}/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="{{ asset('metronic') }}/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="{{ asset('metronic') }}/assets/admin/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});
</script>
</html>
