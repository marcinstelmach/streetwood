<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assetss/img/favicon.png">

    <title>StreetWood - Panel administracyjny</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetss/css/bootstrap.css" media="screen" type="text/css" />

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url(); ?>assetss/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetss/css/dashboard.css" media="screen" type="text/css" />

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url(); ?>assetss/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url().'administrator/nowe-zamowienia'; ?>">StreetWood</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><?php echo anchor('administrator/wyloguj', 'Wyloguj'); ?></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li <?php if($this->uri->segment(2)=='nowe-zamowienia') echo 'class="active"' ?> ><?php echo anchor('administrator/nowe-zamowienia', 'Nowe Zamówienia'); ?></li>
            <li <?php if($this->uri->segment(2)=='oczekujace-na-zaplate') echo 'class="active"' ?> ><?php echo anchor('administrator/oczekujace-na-zaplate', 'Oczekujące na zapłate'); ?></li>
            <li <?php if($this->uri->segment(2)=='nie-wyslane') echo 'class="active"' ?> ><?php echo anchor('administrator/nie-wyslane', 'Nie wysłane'); ?></li>
            <li <?php if($this->uri->segment(2)=='zakonczone') echo 'class="active"' ?> ><?php echo anchor('administrator/zakonczone', 'Zakończone'); ?></li>            
          </ul>
          <ul class="nav nav-sidebar">
            <li <?php if($this->uri->segment(2)=='dodaj-przedmiot') echo 'class="active"' ?>><?php echo anchor('administrator/dodaj-przedmiot', 'Dodaj przedmiot'); ?></li>
            <li <?php if($this->uri->segment(2)=='modyfikacja-przedmiotu') echo 'class="active"' ?>><?php echo anchor('administrator/modyfikacja-przedmiotu', 'Edytuj przedmiot'); ?></li>
            <li <?php if($this->uri->segment(2)=='dodaj-kategorie') echo 'class="active"' ?>><?php echo anchor('administrator/dodaj-kategorie', 'Utwórz nową kategorię'); ?></li>
            <li <?php if($this->uri->segment(2)=='modyfikacja-kategorii') echo 'class="active"' ?>><?php echo anchor('administrator/modyfikacja-kategorii', 'Edytuj kategorię'); ?></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li <?php if($this->uri->segment(2)=='statystyki') echo 'class="active"' ?>><?php echo anchor('administrator/statystyki', 'Statystyki sprzedazy'); ?></li>
              <li <?php if($this->uri->segment(2)=='dostawy') echo 'class="active"' ?>><?php echo anchor('administrator/dostawy', 'Dostawy'); ?></li>
              <li <?php if($this->uri->segment(2)=='stale-ceny') echo 'class="active"' ?>><?php echo anchor('administrator/stale-ceny', 'Stałe Ceny'); ?></li>

          </ul>
        </div>