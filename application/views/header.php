<!DOCTYPE html>
<html lang="pl"> 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Street Wood</title> 
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetss/css/bootstrap.min.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetss/css/style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="http://localhost/streetwood/assetss/css/fontello.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assetss/img/favicon.png">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid first_container">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <a class="social-links" href="tel:753-159-852"><i class="icon-globe" style="font-size: 20px;"></i> MY LOCATION POLAND</a>
          </div>
          <div class="col-md-offset-5 col-md-4">
            <a class="social-links" href="http://facebook.com/streetwoodpl"><i class="icon-facebook-official" style="font-size: 20px;"></i></a>
            <a class="social-links" href="http://instagram.com/street_wood"><i class="icon-instagram" style="font-size: 20px;"></i></a>
            <a class="social-links" href="#"><i class="icon-snapchat-ghost" style="font-size: 20px;"></i></a>
            <a class="social-links" href="<?php echo base_url().'uzytkownik/zaloguj'; ?>">ZALOGUJ SIĘ</a> | 
            <a class="social-links" href="<?php echo base_url().'uzytkownik/rejestracja'; ?>">ZAREJESTRUJ SIĘ</a>
            <a class="social-links" href="#"><i class="icon-basket" style="font-size: 20px;"></i></a>
          </div>
        </div>
      </div>
    </div>

    <!--MENU -->
    <nav class="navbar navbar-default" role="navigation" style="padding-top: 10px;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Rozwiń nawigację</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-left" href="#"><img src="<?php echo base_url(); ?>assetss/img/logo.jpg"></a>
        </div><!--Zamknięcie headera-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bransoletki<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Sznureczek</a></li>
                <li><a href="#">Koraliki</a></li>
                <li><a href="#">Kotwica</a></li>
                <li><a href="#">Guzik</a></li>
              </ul>
            </li>
            <li><a href="#">Case</a></li>
            <li><a href="#">Odzież</a></li>
            <li><a href="#">BackPack</a></li>            
          </ul>
        </div>
      </div>
    </nav> <!-- Koniec menu nav -->

    <!-- SLIDER -->
        <div id="carousel-example" class="carousel slide" data-ride="carousel">


          <div class="carousel-inner">
            <div class="item active">
              <a href="#"><img src="<?php echo base_url(); ?>assetss/img/slider/2.jpg" alt="Zdjęcie 1" /></a>
            </div>
            <div class="item">
              <a href="#"><img src="<?php echo base_url(); ?>assetss/img/slider/1.jpg" alt="Zdjęcie 2" /></a>
            </div>
            <div class="item">
              <a href="#"><img src="<?php echo base_url(); ?>assetss/img/slider/3.jpg" alt="Zdjęcie 3" /></a>
            </div>
          </div>

          <a class="left carousel-control" href="#carousel-example" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
    <!--Koniec Slider -->