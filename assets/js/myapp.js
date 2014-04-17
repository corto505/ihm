$(document).ready(function() {
   //:::::::  EVENT CHARGEMENT  :::::::
   
      $('#tabMenu').hide();
 
   //-------  MENU LATERAL  ------
     $('#simple-menu').sidr();
   
     //------- CALENDRIER  ---------
   var madate = new Date();
   var nomDesJours = new Array('dimanche','lundi','mardi','mercredi','jeudi','vendredi','samedi');
   var indicejour = madate.getDay();
   var lejour = madate.getDate();
   
   // ::::::::::: Horloge  ::::::::::  
   var clock = $('.your-clock').FlipClock({
         // ... your options here
   });
   var hh = ( 3600 * madate.getHours()) +(60 * madate.getMinutes())+ (madate.getSeconds());
   clock.setTime(hh+2);
   
   $('#jour').html(lejour);
   $('#mois').html(nomDesJours[indicejour]);
 
 
   
     //:::::::  EVENT ON CLICK   :::::::
    $('#btnMenu').click(function (){
          $('#tabMeto').fadeOut('slow', function (){
                $('#tabMenu').fadeIn();
            });
          
       
    });
   
   $('#btnMeteo').click(function (){
          $('#tabMenu').fadeOut('slow', function (){
                $('#tabMeto').fadeIn();
            });
          
       
    });
   //:::::::::::  METEO APIOPEN  ::::::::::::::
 
       $('#meteo').click(function(){
        jQuery.getJSON(
        'http://api.openweathermap.org/data/2.5/forecast/weather?q=London&mode=json&units=metric',
        function(data,textStatus,jqXHR){
             console.dir(data);
   
        });
        
    });
   
   
   //:::::::::::  Ajax  ::::::::::::
   
   $('#test2').click(function (){
   
         $.ajax ({
         type : 'GET',
         url: '../modules/montest',
         dataType : 'json',
         success  : function (data){
            affiche(data);
         }
      });
      
   });

});
function  affiche(data){
    
      $('#tplt').html(Mustache.render($('#tplt').html(),{tuto : data}));
 
};

function  affiche1(data){
    
    console.dir(data);
    
    var $tplt = $('#tplt').html();
  //  $('#tplt').remove();
for (var i in data ){
     $('#sortie').append(Mustache.render($tplt,data[i]));
}
 
};

//::::::  *********  LES TESTT  ::::::::::
    $('#meteo').click(function(){
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