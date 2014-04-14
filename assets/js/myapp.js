$(document).ready(function() {
   
   //:::::::::::::  MENU LATERAL  :::::::::::::
   $('#simple-menu').sidr();
   
   //:::::::::   CALENDRIER  :::::::::::::::
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
   
   //:::::::::::  METEO APIOPEN  ::::::::::::::
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
           // $('#contenu').html(mytxt);
        });
        
    });
    
    $("#meteo2").click(function (){
        
        $.ajax({
          method : 'GET',
          url :'http://api.openweathermap.org/data/2.5/weather?q=London&mode=json&units=metric'
          
        }).done (function (arg){
           $.each(data.item, function (i, item){
               
           })
        })
    });
   
   
   
   //:::::::::::  Ajax  ::::::::::::
   
   $('#test2').click(function (){
      
      $.ajax ({
         type : 'GET',
         url: '../modules/montest',
         dataType : 'json',
         success  : function (data){
            var txt='<div>';
            $.each (data,function (itemIndex, item){
               txt+='<P>Nom : '+item.nom+'</p>'+'<P>Type module :'+item.type_module+'</p>'
            })
           txt+='</div>'
             $('#piece').html(txt);
         }
      });
      
   });

});

