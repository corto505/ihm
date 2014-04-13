$(document).ready(function() {
   
   $('#simple-menu').sidr();
   
   /**********/
   var madate = new Date();
 
   
      var clock = $('.your-clock').FlipClock({
      
// ... your options here
   });
     var hh = ( 3600 * madate.getHours()) +(60 * madate.getMinutes())+ (madate.getSeconds());
   clock.setTime(hh+2);

});

