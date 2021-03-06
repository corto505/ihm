<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modules extends CI_Controller {

	
	/*
	*  Par defaut affiche les lumieres
	*/
	public function index(){ //ok
		$this->liste_modules('Light');
     }
	
    /*
	*  Les des # thermomètres
	*/
	public function thermo(){		
		$this->liste_modules('Temp');
     }

     /*
	*  Les des # thermomètres
	*/
	public function scenes(){		
		$data['title']= 'Scènes Domoticz';
		$data['leType']= 'Scènes';
		$this->load->view('scenes_vw',$data);//
		
     }

      /*
	*  Liste des modules filtre par pièces
	*/
	public function piece($piece=''){
		$data['title']= 'Pièce: ';	
		$data['leType']= $piece;	
		$this->load->view('modules_piece_vw',$data);//
     }

    /*
	*  Envoi une commande à domoticz
	*/
	public function send_cde($id,$cde){ 
		
		$this->load->helper('file');
		write_file('./assets/json/modules_debug.log', date('Y-m-d H:i').' : json.htm?type=command&param=switchlight&idx='.$id.'&switchcmd='.$cde."\r\n", 'a');
		
		$url=prefrences("domoticz").'json.htm?type=command&param=switchlight&idx='.$id.'&switchcmd='.$cde.'&level=0';
		//echo '<br> modules : URL = '.$url;
		$content = curl_json($url);
		///redirect(base_url());
		
        }


 /*
	*  Envoi une commande au serveur nodejs/Rpbi1 pour actionner un relai
	
	public function send_cde_relai($id,$tempo=0){ 
		
		//$this->load->helper('file');
		//write_file('./assets/json/modules_debug.log', date('Y-m-d H:i').' : json.htm?type=command&param=switchlight&idx='.$id.'&switchcmd='.$cde."\r\n", 'a');
		
		$url=prefrences("nodejs").'vntest/'.$id;
		echo '<br> modules : URL = '.$url;
		$content = curl_json($url);
		var_dump($content);
		///redirect(base_url());
		
        }
*/
        

/**
 *  Affiche les modules par pieces via ajax et ANgular
 **/
	public function liste_modules($type){

		$data['title']= 'Modules Domoticz';
		$data['leType']= $type;
		if($type!="Temp")
			$this->load->view('modules_vw',$data);//
		else
			$this->load->view('temp_vw',$data);//
        }
        

	public function meteo() {
		
		//$this->load->helper('file');
		//$contenu = read_file ('./assets/json/exple_meteo.json');
		
		//echo $contenu;
		$data['title']= 'Quel temps fera t-il ?';
		$data['leType']= 'Météo';
		$this->load->view('meteo_ajx_vw',$data);
		
        }
        
}