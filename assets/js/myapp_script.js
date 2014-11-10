
var ip_serveur = "http://192.168.0.66:8090/";
var ip_nodejs1 = "http://192.168.0.64:3000/";

/*******************************************************
*                JQUERY  - AJAX
*
*******************************************************/
//*******   Ajax : Btn ON|OFF  bouton module **********
 /**
 * Pb avec angular et Jquery => le click n' eétait pas intecepté ??
 */  
$(document).on("click", ".btn_appareil", function() { 

        var idbtn = $(this).attr('idbtn');
        var typebtn = $(this).attr('typebtn');
         // alert('id btn = '+idbtn+" type cde"+typebtn);
          
        $.ajax({
          type: "GET",
              url: ip_serveur+"ihm/index.php/modules/send_cde/"+idbtn+"/"+typebtn,
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

 /**
*   Initialisation des relais
*/
$("#vlt_init").click (function() { 

      $.ajax({
          type: "GET",
              url: ip_nodejs1+"init_relai",
          error:function(msg){
            alert( "Error init_relai a échoué !: " + msg );
          console.log(msg);
          },
          success:function(data){
              //affiche le contenu du fichier dans le conteneur dédié
              $('#retour').text(data);
            //  socket.emit('messclient',{message : 'app = '+name+' -> '+typebtn}); // on envoi un mess au serveur IO
          }
        });
});

  /**
*   gestion des boutons des volets
*/
$(".vlt_sc").click (function() { 

        var idbtn = $(this).attr('idbtn');
        var ledelai = $(this).attr('delai');

       // var typebtn = $(this).attr('typebtn');
         // alert('id btn = '+idbtn) ; //+" type cde"+typebtn);
          
        $.ajax({
          type: "GET",
             // url: "http://192.168.0.66:8090/ihm/index.php/volets/relai_pulse/"+idbtn+"/"+ledelai,
              url: ip_nodejs1+'relai/'+idbtn+'/On/'+ledelai,
          error:function(msg){
           alert( "app:Error cde relai !: " + msg );
            console.log(msg);
          },
          success:function(data){
              //affiche le contenu du fichier dans le conteneur dédié
              $('#retour').text("commande envoyée");
            //  socket.emit('messclient',{message : 'app = '+name+' -> '+typebtn}); // on envoi un mess au serveur IO
          }
        });
});


/**
*   gestion des boutons des volets groupes
*/
$(".vlt_sc_gp").click (function() { 

        var idgp = $(this).attr('idgp');
        var idordre = $(this).attr('idordre');
       // var typebtn = $(this).attr('typebtn');
        //alert('id btn = '+idordre) ; //+" type cde"+typebtn);
          
        $.ajax({
          type: "GET",
              url: "volets/volet_action_groupe/"+idgp+"/"+idordre,
          error:function(msg){
           alert( "Error cde relai !: " + msg );
          console.log(msg);
          },
          success:function(data){
              //affiche le contenu du fichier dans le conteneur dédié
              $('#retour').text(data);
            //  socket.emit('messclient',{message : 'app = '+name+' -> '+typebtn}); // on envoi un mess au serveur IO
          }
        });
});

$('#testBtn').click(function(){
 //alert('test btn');
    $.ajax ({
        type: 'GET',
        url: ip_nodejs1+'test_json',
        dataType: 'json',

        error: function(msg){
          alert('App : erreur file json');

        },
        success:function(data){
              //affiche le contenu du fichier dans le conteneur dédié
              $('#retour').text(data);
            //  socket.emit('messclient',{message : 'app = '+name+' -> '+typebtn}); // on envoi un mess au serveur IO
          }
    });

   // alert(ip_nodejs1+'test_json');
});


   //:::::::           EVENT CHARGEMENT                :::::::
   
      $('#tabMenu').hide();
   
  
       //:::::::              EVENT ON CLICK                 :::::::
     
     //----    affiche la div Menu -----
    $('#btnMenu').click(function (){
          $('#tabMeteo').fadeOut('slow', function (){
                $('#tabMenu').fadeIn();
            });
    });
   
   //-----    affiche la div Meteo  ------
   $('#btnMeteo').click(function (){
          $('#tabMenu').fadeOut('slow', function (){
                $('#tabMeteo').fadeIn();
            });
    });
   
 
});


//::::::  *********  LES TESTT  ::::::::::
    //-----    affiche la div Meteo  ------
   $('#testclick').click(function (){
          alert('Jquery : Test click');
    });
   

