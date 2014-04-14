<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0;" />
    <meta http-equiv="Cache-Control" content="public"/>
    <meta name="viewport" content="width=349px" />
    <title>Tableau de bord </title>

  
      <link rel="stylesheet" href="<?php echo css_url('bootstrap.min') ?>">
    <link rel="stylesheet" href="<?php echo css_url('flipclock') ?>">
    <link rel="stylesheet" href="<?php echo css_url('jquery.sidr.dark') ?>">
    <link rel="stylesheet" href="<?php echo css_url('mystyle') ?>">

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo js_url('flipclock.min') ?>"></script>
    <script type="text/javascript" src="<?php echo js_url('jquery.sidr.min') ?>"></script>
    <script type="text/javascript" src="<?php echo js_url('myapp') ?>"></script>
 
</head>

<body>
    <!--[if lt IE 7]>
             <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
         <![endif]-->
    <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

<div class="row">
	<div id="sidr" class="sidr left" >
		<ul>
			<li><a href="/">Accueil</a></li>
			<li><a href="/piece/all">Salle</a></li>
			<li><a href="/vnstat/x">Bureau</a></li>
			<li><a href="/scenari">Chambre rdc</a></li>
			<li class="hidden-xs hiiden-sm"><a href="/heure">sdb</a></li>
			<li><a href="#" id="btnlogin">couloir</a></li>
		</ul>
	</div>
</div>

<div class="row">
    
    <a id="simple-menu" href="#sidr">
        <button class="btn btn-primary ">
                <span class="glyphicon glyphicon-th-list"> </span>
        </button>
    </a>
</div>
        
