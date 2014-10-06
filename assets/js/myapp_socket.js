// *********  Test de socket  ************
  $(document).ready( function() {

    var socket = io.connect('http://192.168.0.64:3000');// voir egalement Layout.jade

    socket.on('logged',function(){

    });

    socket.on('newuser',function(info){
      //alert('eeee');
      $('#infos').html('<H3>'+info.heure+' : '+info.min+'</H2>');
    });


});