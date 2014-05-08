//::::::::::::::::  ANGULAR  ::::::::::::
var app = angular.module('domo',['ngAnimate','ngTouch']);

app.config(function($locationProvider){
  $locationProvider.html5Mode(true);
});
//-------------  LES BTN  ---------
app.controller ('ctrlBtn',function($scope,$http){
  
  $scope.method = 'GET';
  $scope.url = 'index.php/welcome/lirebouton/file/json';

  $scope.code = null;
  $scope.response = null;

  $http({method: $scope.method, url: $scope.url}).
      success(function(data, status) {
        console.log(status);
        
        $scope.lesBoutonsTdb = data.tdb;
        $scope.lesBoutonsMenu = data.menu;
        console.log("Menu bnt => "+$scope.lesBoutonsMenu);
        console.log("Tdb bnt => "+$scope.lesBoutonsTdb);
      }).
      error(function(data, status) {
        $scope.data = data || "Request failed";
        $scope.status = status;
  });

});
//-------------  LES MODULES  ---------
app.controller ('ctrlModules',function($scope,$http){
  
  $scope.method = 'GET';
  $scope.url = 'http://192.168.0.63:8888/ihm/index.php/welcome/lireFileDomo/file/json';

  $scope.code = null;
  $scope.response = null;

  $http({method: $scope.method, url: $scope.url}).
      success(function(data, status) {
        //console.log(data);
        
        $scope.lesmodules = data.result;
        
    }).
    error(function(data, status) {
      $scope.data = data || "Request failed";
      $scope.status = status;
   
  });


});
//-------------  LES PIECES  ---------
app.controller ('ctrlRoom',function($scope,$http){
  
  $scope.method = 'GET';
  $scope.url = 'lirepieces/file/json';

  $scope.code = null;
  $scope.response = null;

  $http({method: $scope.method, url: $scope.url}).
      success(function(data, status) {
        console.log(data);
      $scope.lespieces = data;

      }).
      error(function(data, status) {
        $scope.data = data || "Request failed";
        $scope.status = status;
  });

// gestion du click
 $scope.pipo = function(code){
    console.log(' On a cliqué sur ===> '+code+" - ");
    
}

});

//*******   Ajax : Btn ON|OFF  bouton module **********
 
 /**
 * Pb avec angular et Jquery => le click n' eétait pas intecepté ??
 */  
$(document).on("click", ".btn_appareil", function() { 

        var idbtn = $(this).attr('idbtn');
        var typebtn = $(this).attr('typebtn');
          //alert('id btn = '+idbtn+" type cde"+typebtn);
        $.ajax({
          type: "GET",
              url: "http://192.168.0.63:8888/ihm/index.php/modules/send_cde/"+idbtn+"/"+typebtn,
          error:function(msg){
           alert( "Error !: " + msg );
          },
          success:function(data){
              //affiche le contenu du fichier dans le conteneur dédié
              $('#retour').text(data);
            //  socket.emit('messclient',{message : 'app = '+name+' -> '+typebtn}); // on envoi un mess au serveur IO
          }
        });
});


$(document).ready(function() {

   //:::::::           EVENT CHARGEMENT                :::::::
   
     // $('#tabMenu').hide();
   
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
          $('#tabTdb').fadeOut('slow', function (){
                $('#tabMenu').fadeIn();
            });
    });
   
    //-----    affiche la div Tdb  ------
   $('#btnTdb').click(function (){
          $('#tabMenu').fadeOut('slow', function (){
                $('#tabTdb').fadeIn();
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
   $("#testclick2").click(function(){
      alert('click by jquery');
   });
   

});



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