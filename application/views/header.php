<!DOCTYPE html>
<html lang="pl" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Street Wood</title> 
   <!-- <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sarala" rel="stylesheet">-->
      <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?=base_url()?>assetss/css/bootstrap.min.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>assetss/css/style.css?v=<?=time();?>" media="screen" type="text/css" />
    <link rel="stylesheet" href="http://localhost/streetwood/assetss/css/fontello.css">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assetss/img/favicon.png">

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
        <a class="navbar-left" href="<?=base_url()?>"><img src="<?=base_url()?>assetss/img/logo.jpg" width="150" alt="Logo"></a>
      </div><!--Zamknięcie headera-->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

            <?php
                $name_kat='';
                foreach ($drzewko as $cat)
                {
                    if ($cat->nazwa_kategorii != $name_kat)
                    {
                        echo ' <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.str_replace('_', '', $cat->nazwa_kategorii).' <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu" style="margin-top:3px">';

                        foreach ($drzewko as $kat)
                        {
                            if ($kat->nazwa_kategorii == $cat->nazwa_kategorii)
                            {
                                echo '<li>' . anchor(strtolower(str_replace(' ', '-', $cat->nazwa_kategorii.'/'.$kat->nazwa_pod_kategorii)), $kat->nazwa_pod_kategorii) . '</li>';
                            }
                        }
                        echo ' </ul>
          </li>';
                    }
                    $name_kat=$cat->nazwa_kategorii;
                }
            ?>
        </ul>
          <ul class="nav navbar-nav navbar-right fejsy">
            <li><a class="social-links" href="http://facebook.com/streetwoodpl"><i class="icon-facebook-official" style="font-size: 20px;"></i></a></li>
            <li><a class="social-links" href="http://instagram.com/street_wood"><i class="icon-instagram" style="font-size: 20px;"></i></a></li>
            <li><a class="social-links" href="#"><i class="icon-snapchat-ghost" style="font-size: 20px;" data-toggle="modal" data-target=".snapcode"></i></a></li>
            <li><a class="social-links" href="<?=base_url().'uzytkownik/zaloguj' ?>">ZALOGUJ SIĘ</a> </li>
            <li><a class="social-links" href="<?=base_url().'uzytkownik/rejestracja' ?>">ZAREJESTRUJ SIĘ</a></li>
            <li><a class="social-links" href="<?=base_url().'koszyk/wyswietl' ?>"><i class="icon-basket" style="font-size: 20px;"></i><span class="badge"><?=$this->cart->total_items()?></span></a></li>
          </ul>
        </ul>
      </div>
    </div>
  </nav> <!-- Koniec menu nav -->
  <!-- Modal -->
  <div class="modal fade snapcode" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <img src="<?=base_url()?>assetss/img/snapcode.jpg" alt="SnapCode" style="width: 300px;">
          </div>
      </div>
  </div>
