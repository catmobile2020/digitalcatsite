<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CAT | @yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{asset('assets/admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{asset('assets/admin/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{asset('assets/admin/css/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{asset('assets/admin/css/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <link href="{{asset('assets/admin/css/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{asset('assets/admin/css/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{asset('assets/admin/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{asset('assets/admin/css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-black">
@include('admin.layouts.header')
<div class="wrapper row-offcanvas row-offcanvas-left">
   @include('admin.layouts.siderbar')

    @yield('content')
</div><!-- ./wrapper -->

<!-- add new calendar event modal -->


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="{{asset('assets/admin/js/jquery-ui-1.10.3.min.js')}}" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/admin/js/bootstrap.min.js')}}" type="text/javascript"></script>
@yield('js')
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('assets/admin/js/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
<!-- Sparkline -->
<script src="{{asset('assets/admin/js/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<!-- jvectormap -->
<script src="{{asset('assets/admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="{{asset('assets/admin/js/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/admin/js/plugins/jqueryKnob/jquery.knob.js')}}" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/admin/js/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('assets/admin/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
<!-- iCheck -->
<script src="{{asset('assets/admin/js/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="{{asset('assets/admin/js/AdminLTE/app.js')}}" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/admin/js/AdminLTE/dashboard.js')}}" type="text/javascript"></script>

</body>
</html>