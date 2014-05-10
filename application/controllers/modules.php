<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modules extends CI_Controller {

	
	/*
	*  Par defaut affiche les lumieres
	*/
	public function index(){ //ok
		$this->liste_modules('Lighting');
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
	
		$url=prefrences("domoticz").'json.htm?type=command&param=switchlight&idx='.$id.'&switchcmd='.$cde.'&level=0';
		echo '<br> modules : URL = '.$url;
		$content = curl_json($url);
		//var_dump($content);
		///redirect(base_url());
		
        }


/**
 *  Affiche les modules par pieces via ajax et ANgular
 **/
	public function liste_modules($type){

		$data['title']= 'Modules Domoticz';
		$data['leType']= $type;
		$this->load->view('modules_vw',$data);//
		
        }
        

	public function meteo() {
		
		//$this->load->helper('file');
		//$contenu = read_file ('./assets/json/exple_meteo.json');
		
		//echo $contenu;
		$this->load->view('meteo_ajx_vw');
		
        }
        
}