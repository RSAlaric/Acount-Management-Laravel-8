<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Comptabilité - Login</title>

  <!-- Favicons -->
  <link href="backend/img/logo_technique-precision.png" rel="icon">
  <link href="backend/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="backend/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="backend/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="backend/lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <!-- Custom styles for this template -->
  <link href="backend/css/style.css" rel="stylesheet">
  <link href="backend/css/style-responsive.css" rel="stylesheet">

</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
        @if (count($errors) > 0)
        <div class="alert alert-danger centered">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif
      <form class="form-login" action="{{url('/create_account')}}" methode="POST">
        {{ csrf_field() }}
        <h2 class="form-login-heading">
            CREER UN COMPTE
        </h2>
        <div class="login-wrap">

          <div class="col-md-9">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: 150px; height: 100px;">
                  <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                </div>
              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 1à0px; line-height: 20px;"></div>
              <div>
                <span class="btn btn-theme02 btn-file">
                  <span class="fileupload-new"><i class="fa fa-paperclip"></i> Choisir un photo</span>
                <span class="fileupload-exists"><i class="fa fa-undo"></i> Changer</span>
                <input type="file" name="image" class="default" />
                </span>
              </div>
            </div>
          </div>
          <br>
          <input type="text" name="pseudo" class="form-control" placeholder="Votre Pseudo" autofocus>
          <br>
          <input type="email" name="email" class="form-control" placeholder="Adresse E-mail" autofocus>
          <br>
          <input type="password" name="motdepasse" class="form-control" placeholder="Mot de passe">
          <br>
          <input type="password" name="motdepasseconfi" class="form-control" placeholder="Confirmer votre Mot de passe">
          <br>

          <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-check"></i> INSCRIRE</button>

        </div>
        {!!Form::close()!!}
    </div>
  </div>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="backend/lib/jquery/jquery.min.js"></script>
  <script src="backend/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="backend/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="backend/lib/jquery.scrollTo.min.js"></script>
  <script src="backend/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="backend/lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="backend/lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="backend/lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="backend/lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("backend/img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
