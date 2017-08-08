<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>UM | Mentor-Mentee</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ URL::asset('dist/css/AdminLTE.min.css') }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ URL::asset('dist/css/skins/_all-skins.min.css') }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ URL::asset('plugins/iCheck/flat/blue.css') }}">
        <!-- Morris chart -->
        <link rel="stylesheet" href="{{ URL::asset('plugins/morris/morris.css') }}">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{ URL::asset('plugins/datepicker/datepicker3.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ URL::asset('plugins/daterangepicker/daterangepicker.css') }}">
        <!-- select2 -->
        <link rel="stylesheet" href="{{ URL::asset('plugins/select2/select2.css') }}">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{ URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
        <!-- Data table CSS -->
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

            <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        @yield('content')
        <!-- Script -->
        <div>
                <!-- DataTables -->
                <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
                <!-- jQuery 2.2.3 -->
                <script src="{{ URL::asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
                <!-- jQuery UI 1.11.4 -->
                <script src="{{ URL::asset('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') }}"></script>
                <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
                <script>
                $.widget.bridge('uibutton', $.ui.button);
                </script>
                <!-- Bootstrap 3.3.6 -->
                <script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
                <!-- Morris.js charts -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
                <script src="{{ URL::asset('plugins/morris/morris.min.js') }}"></script>
                <!-- Sparkline -->
                <script src="{{ URL::asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
                <!-- jvectormap -->
                <script src="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
                <script src="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
                <!-- jQuery Knob Chart -->
                <script src="{{ URL::asset('plugins/knob/jquery.knob.js') }}"></script>
                <!-- daterangepicker -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
                <script src="{{ URL::asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
                <!-- datepicker -->
                <script src="{{ URL::asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
                <!-- Bootstrap WYSIHTML5 -->
                <script src="{{ URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
                <!-- Slimscroll -->
                <script src="{{ URL::asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
                <!-- FastClick -->
                <script src="{{ URL::asset('plugins/fastclick/fastclick.js') }}"></script>
                <!--Select2-->
                <script src="{{ URL::asset('plugins/select2/select2.js') }}"></script>
                <!-- AdminLTE App -->
                <script src="{{ URL::asset('dist/js/app.min.js') }}"></script>
                <!-- App scripts -->
                @yield('script')
        </div>
    </body>
</html>
