//::::::::::::::::  ANGULAR  ::::::::::::
var app = angular.module('domo',['ngAnimate','ngTouch']);

app.controller ('ctrlBtn',function($scope,$http){
  
  $scope.method = 'GET';
  $scope.url = 'index.php/welcome/lirebouton/file/json';

  $scope.code = null;
  $scope.response = null;

  $http({method: $scope.method, url: $scope.url}).
      success(function(data, status) {
        console.log(status);
        console.log("autres bnt => "+data);
        $scope.lesBoutons = data;
    }).
    error(function(data, status) {
      $scope.data = data || "Request failed";
      $scope.status = status;
  });

// Boutons du tableau de bords
   var btnMenu = [{
    "nom" : "Inter",
    "icone" : "upload",
    "couleur" : "btn-green",
    "pied" : "module On/Off",
    "actif" : true,
    "url" : ''
  },
  {
    "nom" : "Lampe",
    "icone" : "adjust",
    "couleur" : "btn-green",
    "pied" : "Les lumières",
    "actif" : true,
    "url" : ''
  },
  {
    "nom" : "Volets",
    "icone" : "align-justify",
    "couleur" : "btn-green",
    "pied" : "Cde volets",
    "actif" : true,
    "url" : ''
  },
  {
    "nom" : "Pièces",
    "icone" : "tower",
    "couleur" : "btn-yellow",
    "pied" : "Liste des pièces",
    "actif" : true,
    "url" : ''
  },
  {
    "nom" : "Scénario",
    "icone" : "refresh",
    "couleur" : "btn-blue",
    "pied" : "Domoticz",
    "actif" : true,
    "url" : ''
  },
  {
    "nom" : "domoticz",
    "icone" : "compressed",
    "couleur" : "btn-blue",
    "pied" : "Le serveur",
    "actif" : true,
    "url" : ''
  }];

  console.log("tdb : => "+btnMenu);  
  $scope.btnMenu = btnMenu;

// gestion du click
 $scope.pipo = function(code){
    console.log(' On a cliqué sur ===> '+code);
    alert("Click via angular");
  }


});



app.controller ('ctrltstJson',function($scope,$http){
  
  $scope.method = 'GET';
  $scope.url = 'index.php/welcome/lirebouton/file/json';

  $scope.code = null;
  $scope.response = null;

  $http({method: $scope.method, url: $scope.url}).
      success(function(data, status) {
        console.log(status);
        console.log("autres bnt => "+data);
        $scope.lesBoutons = data;
    }).
    error(function(data, status) {
      $scope.data = data || "Request failed";
      $scope.status = status;
  });
});



$(document).ready(function() {

   //:::::::           EVENT CHARGEMENT                :::::::
   
      $('#tabMenu').hide();
   
     //------- CALENDRIER  ---------
   var madate = new Date();
   var nomDesJours = new Array('dimanche','lundi','mardi','mercredi','jeudi','vendredi','samedi');
   var indicejour = madate.getDay();
   var lejour = madate.getDate();
   
        
   $('#jour').html(lejour);
   $('#mois').html(nomDesJours[indicejour]);
 
 
   
     //:::::::              EVENT ON CLICK                 :::::::
     
      //-----    affiche la div Meteo  ------
   $('#testclick').click(function (){
          alert('Jquery : Test click');
    });
   

     //----    affiche la div Menu -----
    $('#btnMenu').click(function (){
          $('#tabMeto').fadeOut('slow', function (){
                $('#tabMenu').fadeIn();
            });
    });
   
   //-----    affiche la div Meteo  ------
   $('#btnMeteo').click(function (){
          $('#tabMenu').fadeOut('slow', function (){
                $('#tabMeto').fadeIn();
            });
    });
   
   
   //:::::::::::  METEO API-OPEN  ::::::::::::::
 
       $('#meteo').click(function(){
        jQuery.getJSON(
        'http://api.openweathermap.org/data/2.5/forecast/daily?q=London&mode=json&units=metric&cnt=8',
        function(data,textStatus,jqXHR){
             //console.dir(data);
             affiche1(data);
        });
        
    });
   
   
   //:::::::::::  Ajax  ::::::::::::
   
   $('#test2').click(function (){
   
         $.ajax ({
         type : 'GET',
         url: '../modules/montest',
         dataType : 'json',
         success  : function (data){
            //console.log(data);
            affiche(data);
         }
      });
      
   });

});


/**
 *  Affichage std
 **/
function  affiche(data){
    
      $('#tplt').html(Mustache.render($('#tplt').html(),{block_data : data}));
 
};


/**
 *  On fait la boucle dans js et non avec Mustache
 **/
function  affiche1(data){
    
    console.log('ville :'+data.city.name);
    console.dir(data.list);
   
 for (var i in data.list ){
       console.dir(data.list[i].temp.day+" ?? "+data.list[i].temp.dt);
   
   }
};

function testMustach(){
   
}

//::::::  *********  LES TESTT  ::::::::::
    $('#meteox').click(function(){
        jQuery.getJSON(
        'http://api.openweathermap.org/data/2.5/forecast/weather?q=London&mode=json&units=metric',
        function(data,textStatus,jqXHR){
           // var mjson = jQuery.parseJSON(data);
            console.log("nom ville : "+data.city.name);
            //$.each(data, function (i,item){
            //    console.log(i);
           // });
            
            var icone ='';
            var jobj = data.list;
            var mytxt='';
            
            for(var c in jobj){
                icone = jobj[c].weather[0].icon+".png";
                mytxt+='<img src="http://openweathermap.org/img/w/'+icone+'"/>';
            }
            console.log(mytxt);
           $('#contenu').html(mytxt);
        });
        
    });