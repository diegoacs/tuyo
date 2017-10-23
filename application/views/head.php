<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tuyo.com - todo lo que quieres lo encuenta aquí</title>

    <!-- Bootstrap core CSS -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDP5opBg3ZbeX96OI9l7Zh_Mc1iK7_NIBs"></script>
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="<?php echo base_url("assets/public/css/style.css?n=".rand()); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle color-white" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-home text-title"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url("index.php/Panel_ini/"); ?>">
                    <img src="<?php echo base_url("assets/public/img/logo1.png?n="); ?>" class="img-responsive">
                </a>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo base_url("index.php/Panel_ini/"); ?>"><span class="fa fa-home"></span>&nbsp;Home</a>
                    </li>
                    <li>
                        <a href="#c1"><span class="fa fa-search"></span>&nbsp;Busca ofertas</a>
                    </li>
                    <li>
                        <a href="#c2"><span class="fa fa-sign-in"></span>&nbsp;Registrate</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("index.php/Panel_ini/#c4"); ?>"><span class="fa fa-envelope-o"></span>&nbsp;Contacto</a>
                    </li>                
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="https:/www.facebook.com"><span class="fa fa-facebook-square color-white"></span>&nbsp;facebook</a>
                    </li>
                    <li>
                        <a href="https:/www.twitter.com"><span class="fa fa-twitter color-white"></span>&nbsp;twitter</a>
                    </li>
                    <li>
                        <a href="https:/www.instagram.com"><span class="fa fa-instagram color-white"></span>&nbsp;instagram</a>
                    </li>                
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>