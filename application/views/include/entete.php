<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Cache-Control" content="public"/>
    <meta name="viewport" content="width=1057" />
    <title><?php echo $leType; ?> </title>

  
      <link rel="stylesheet" href="<?php echo css_url('bootstrap.min') ?>">
      <link rel="stylesheet" href="<?php echo css_url('mystyle') ?>">

    <script type="text/javascript" src="<?php echo js_url('jquery/jquery_1.10.min') ?>"></script>
    <script type="text/javascript" src="<?php echo js_url('angular/angular.min') ?>"></script>
     <script type="text/javascript" src="<?php echo js_url('angular/angular-touch.min') ?>"></script>
      <script type="text/javascript" src="<?php echo js_url('angular/angular-animate.min') ?>"></script>
 
</head>

<body ng-app="domo">
    <!--[if lt IE 7]>
             <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
         <![endif]-->
    <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

<div class="row">
    <div id="bar-top">
    </div>    
</div>

<div class="row barre_menu">
    <a href="/ihm" class="btn btn-green ">
        <span class="glyphicon glyphicon-2x glyphicon-time"> </span>
    </a>
    <a href="<?php echo base_url() ;?>index.php/welcome/speech" class="btn btn-green ">
        <span class="glyphicon glyphicon-2x glyphicon-volume-down"> </span>
     </a>
<?php if ($leType=="Météo") {  // Ajout mennu specifique pour Meteo 
    echo '
     <button class="btn btn-green" id="btnMenu">
        <span class="glyphicon glyphicon-2x glyphicon-list-alt"> </span>
     </button>

     <a href="" class="btn btn-green" id="btnMeteo">
        <span class="glyphicon glyphicon-2x glyphicon-cloud"> </span>
     </a>
     ';
 }?>
 <a href="<?php echo base_url() ;?>index.php/tablette" class="btn btn-green ">
        <span class="glyphicon glyphicon-2x glyphicon-home"> </span>
    </a>
</div>