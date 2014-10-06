<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     <!-- Sets initial viewport load and disables zooming  -->
    <meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />

    <!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="Cache-Control" content="public"/>
    <meta name="viewport" content="width=1057" />
    <title><?php echo $leType; ?> </title>

  
     <link rel="stylesheet" href="<?php echo css_url('style_phone') ?>">

    <script type="text/javascript" src="<?php echo js_url('angular/angular.min') ?>"></script>
    <script type="text/javascript" src="<?php echo js_url('angular/angular-route.min') ?>"></script>
 
</head>

<body ng-app="myApp">
    <!--[if lt IE 7]>
             <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
         <![endif]-->
    <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

