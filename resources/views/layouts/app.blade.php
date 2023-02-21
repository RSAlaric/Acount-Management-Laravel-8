<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>@yield('title')</title>

  <!-- Favicons -->
  <link href="{{asset('backend/img/logo_technique-precision.png')}}" rel="icon">
  <link href="{{asset('backend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('backend/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!--external css-->
  <link href="{{asset('backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{asset('backend/css/zabuto_calendar.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('backend/lib/gritter/css/jquery.gritter.css')}}" />
  <link href="{{asset('backend/lib/advanced-datatable/css/demo_page.css')}}" rel="stylesheet" />
  <link href="{{asset('backend/lib/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('backend/lib/advanced-datatable/css/DT_bootstrap.css')}}" />
  <!--datepicker js-->
  <link rel="stylesheet" type="text/css" href="{{asset('backend/lib/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('backend/lib/bootstrap-datepicker/css/datepicker.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('backend/lib/bootstrap-daterangepicker/daterangepicker.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('backend/lib/bootstrap-timepicker/compiled/timepicker.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('backend/lib/bootstrap-datetimepicker/datertimepicker.css')}}" />
  <link rel="stylesheet" href="{{asset('backend/lib/file-uploader/css/jquery.fileupload.css')}}">
  <link rel="stylesheet" href="{{asset('backend/lib/file-uploader/css/jquery.fileupload-ui.css')}}">
  <!-- Custom styles for this template -->
  <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet">
  <script src="{{asset('backend/lib/chart-master/Chart.js')}}"></script>
</head>

<body>
  <section id="container">
    {{--START HEADER--}}
        @include('include.header')
    {{--START HEADER--}}

    {{--START SIDEBAR--}}
        @include('sidebar.sidebar')
    {{--END SIDEBAR--}}

    {{--START CONTENT--}}
        @yield('content')
    {{--END CONTENT--}}


    {{--START FOOTER--}}
        @include('include.footer')
    {{--END FOOTER--}}

  </section>
    <!-- SCRIPT MIANTSO AN'ILAY RECHERCHE NATAOKO T@ AJAX-->
    <script type="text/javascript" src="{{asset('backend/lib/jquery.backstretch.min.js')}}"></script>
    <script src="{{asset('backend/ajax/libs/jquery/3.3.1/jquery.min.js')}}"></script>
    <script src="{{asset('backend/ajax/libs/popper.js/1.14.3/umd/popper.min.js')}}" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{asset('backend/lib/bootstrap/4.1.3/js/bootstrap.min.js')}}" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- FIN SCRIPT MIANTSO AN'ILAY RECHERCHE NATAOKO T@ AJAX -->
    <script src="{{asset('backend/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/lib/bootbox/js/bootbox.min.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{asset('backend/lib/advanced-datatable/js/jquery.js')}}"></script>
    <script class="include" type="text/javascript" src="{{asset('backend/lib/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('backend/lib/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('backend/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/lib/jquery.sparkline.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{asset('backend/lib/advanced-datatable/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/lib/advanced-datatable/js/DT_bootstrap.js')}}"></script>
    <!-- DATEPICKER -->

    <script src="{{asset('backend/lib/jquery-ui-1.9.2.custom.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/lib/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/lib/bootstrap-daterangepicker/date.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/lib/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/lib/bootstrap-daterangepicker/moment.min.js')}}"></script>
    <!-- END DATEPICKER -->

      <!--common script for all pages-->
    <script src="{{asset('backend/lib/common-scripts.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/lib/gritter/js/jquery.gritter.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/lib/gritter-conf.js')}}"></script>


    <!--script for this page-->
    <script src="{{asset('backend/lib/sparkline-chart.js')}}"></script>
    <script src="{{asset('backend/lib/zabuto_calendar.js')}}"></script>
    <script src="{{asset('backend/lib/advanced-form-components.js')}}"></script>
    <script src="{{asset('backend/lib/common-scripts.js')}}"></script>

    @yield('scripts3')
    @yield('scripts2')
   @yield('scripts')

</body>

</html>
