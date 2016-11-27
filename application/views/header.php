<!DOCTYPE html>
<html lang="pl" xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Street Wood</title> 
   <!-- <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Sarala" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetss/css/bootstrap.min.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetss/css/style.css?v=<?=time();?>" media="screen" type="text/css" />
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
  <nav class="navbar navbar-inverse navbar-custom navbar-fixed-top" role="navigation" style="padding-top: 10px;">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Rozwiń nawigację</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-left" href="#"><img src="<?php echo base_url(); ?>assetss/img/logo.jpg" width="150"></a>
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
          <ul class="nav navbar-nav navbar-right fejsy">
            <li><a class="social-links" href="http://facebook.com/streetwoodpl"><i class="icon-facebook-official" style="font-size: 20px;"></i></a></li>
            <li><a class="social-links" href="http://instagram.com/street_wood"><i class="icon-instagram" style="font-size: 20px;"></i></a></li>
            <li><a class="social-links" href="#"><i class="icon-snapchat-ghost" style="font-size: 20px;"></i></a></li>
            <li><a class="social-links" href="<?php echo base_url().'uzytkownik/zaloguj'; ?>">ZALOGUJ SIĘ</a> </li>
            <li><a class="social-links" href="<?php echo base_url().'uzytkownik/rejestracja'; ?>">ZAREJESTRUJ SIĘ</a></li>
            <li><a class="social-links" href="#"><i class="icon-basket" style="font-size: 20px;"></i></a></li>
          </ul>
        </ul>
      </div>
    </div>
  </nav> <!-- Koniec menu nav -->
