@extends('layouts.basic')

@section('content')
    @parent
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include('inc.header_navbar')
            @include('inc.sidebar')
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <h1>
                    {{ $data['title'] }}
                    <small>Control panel</small>
                </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    @yield('content-app')
                </section>
            </div>
        </div>
        
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
                <!-- AdminLTE App -->
                <script src="{{ URL::asset('dist/js/app.min.js') }}"></script>
                <!-- App scripts -->
                @yield('script')
        </div>
    </body>
@endsection