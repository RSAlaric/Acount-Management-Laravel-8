<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Classe - Liste</title>



    <!-- Bootstrap core CSS -->
    <link href="{{asset('backend/lib/bootstrap/css/bootstrap.min.css')}} rel="stylesheet">
    <!--external css-->
    <link href="{{asset('backend/lib/font-awesome/css/font-awesome.css')}} rel="stylesheet" />
    <link rel="stylesheet" type="text/css')}} href="{{asset('backend/lib/bootstrap-fileupload/bootstrap-fileupload.css')}} />
    <link rel="stylesheet" type="text/css')}} href="{{asset('backend/lib/bootstrap-datepicker/css/datepicker.css')}} />
    <link rel="stylesheet" type="text/css')}} href="{{asset('backend/lib/bootstrap-daterangepicker/daterangepicker.css')}} />
    <link rel="stylesheet" type="text/css')}} href="{{asset('backend/lib/bootstrap-timepicker/compiled/timepicker.css')}} />
    <link rel="stylesheet" type="text/css')}} href="{{asset('backend/lib/bootstrap-datetimepicker/datertimepicker.css')}} />
    <!-- Custom styles for this template -->
    <link href="{{asset('backend/css/style.css')}} rel="stylesheet">
    <link href="{{asset('backend/css/style-responsive.css')}} rel="stylesheet">

  </head>

<body>
  <section id="container">


    <section id="main-content">
      <section class="wrapper">

        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <header class="panel-heading wht-bg">
                <p class="gen-case">
                  <img src="backend/img/logo_tp.jpg" width="80">
                </p>
              </header>
              <div class="panel-body minimal">
                <center><h4><b><u>LISTE DES CLASSES</u></b></h4></center>
                  <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="1" class="display table table-bordered" id="hidden-table-info">
                      <thead>
                        <tr>
                          <th class="centered"><center>  Nom du Compte </center></th>
                          <th class="centered"><center>  Rang  </center></th>
                          <th class="centered"><center>  Date du derniére mise à jour  </center></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($pcomptables as $pcomptables)
                          <tr class="gradeX">
                            <td class="centered"><center>  {{$pcomptables->nom_compte}}  </center></td>
                            <td class="centered"><center>  {{$pcomptables->rang_classe}}  </center></td>
                            <td class="centered"><center>  {{$pcomptables->derniere_ajout_date}}  </center></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- row -->

      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>

        </p>
      </div>
  </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{asset('backend/lib/jquery/jquery.min.js')}}></script>
  <script src="{{asset('backend/lib/bootstrap/js/bootstrap.min.js')}}></script>
  <script class="include" type="text/javascript" src="{{asset('backend/lib/jquery.dcjqaccordion.2.7.js')}}></script>
  <script src="{{asset('backend/lib/jquery.scrollTo.min.js')}}></script>
  <script src="{{asset('backend/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="{{asset('backend/lib/common-scripts.js')}}"></script>
  <!--script for this page-->
  <script src="{{asset('backend/lib/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-daterangepicker/date.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend/lib/bootstrap-daterangepicker/moment.min.js')}}"></script>
  <script src="{{asset('backend/lib/advanced-form-components.js')}}></script>

</body>

</html>
