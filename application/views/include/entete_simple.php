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
    <script type="text/javascript" src="<?php echo js_url('myapp') ?>"></script>
 
</head>

<body>
    <!--[if lt IE 7]>
             <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
         <![endif]-->
    <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->


<div class="row">
    <div id="bar-top"></div>    
</div>

<div class="row barre_menu">
  <a href="#" class="btn btn-green ">
        <span class="glyphicon glyphicon-2x glyphicon-minus"> </span>
    </a>
   <a href="<?php echo base_url() ;?>index.php/tablette" class="btn btn-green ">
        <span class="glyphicon glyphicon-2x glyphicon-home"> </span>
    </a>
     

    <div class="tabs" id="tabs1">
         <a href="#contenu1" class="btn btn-green ">
            <span class="glyphicon glyphicon-2x glyphicon-th-large"> </span>
        </a>
        <a href="#contenu2" class="btn btn-green ">
            <span class="glyphicon glyphicon-2x glyphicon-road"> </span>
         </a>
        <a href="#contenu3" class="btn btn-green ">
            <span class="glyphicon glyphicon-2x glyphicon-flag"> </span>
         </a>
    </div>

</div>