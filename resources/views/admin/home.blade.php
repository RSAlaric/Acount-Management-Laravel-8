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
      <form class="form-login" action="{{url('/dashboard')}}">
        <h2 class="form-login-heading">
          <p class="centered"><img src="backend/img/ui-sam.jpg" class="img-circle" width="100"></p>
        </h2>
        <div class="login-wrap">
          <input type="email" name="email" class="form-control" placeholder="Adresse E-mail" autofocus>
          <br>
          <input type="password" name="motdepasse" class="form-control" placeholder="Mot de passe">
          <label class="checkbox">

            <span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal"> Mot de passe oublier?</a>
            </span>
            </label>
          <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> CONNECTER</button>
          <hr>

          <div class="registration">
            Vous n'avez pas encore un compte?<br/>
            <a class="" href="{{url('/signup')}}">
              Creer un compte
              </a>
          </div>
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Entrer votre adresse e-mail pour recupérer votre mot de passe</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Annuler</button>
                <button class="btn btn-theme" type="button">Envoyer</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="backend/lib/jquery/jquery.min.js"></script>
  <script src="backend/lib/bootstrap/js/bootstrap.min.js"></script>
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
