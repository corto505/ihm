<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['title']= 'Tableau de bord';
		
		$this->load->view('test_vw',$data);
		//$this->meteo_api('caen','txt');
	}
	
	/**
	 *  Interogation API OpnMeteo
	 **/
	public function meteo_api($ville,$sortie='txt')
	{
		
		$url = 'api.openweathermap.org/data/2.5/forecast/daily?q=caen,france&units=metric&mode=json'; // ou switchcmd=Off
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);

		$c = curl_exec($ch);
		curl_close($ch); 
		$var_json = json_decode($c, true);
		
		if($sortie=='txt'){
			echo '<pre>';
			var_dump($var_json);
		}
		else
		{	
		$data['meteo']=$var_json['list'];
		$data['ville'] = $var_json['city']['name'];
		$data['pressure'] = $var_json['list'][1]['pressure'];
		$data['temp'] = $var_json['list'][1]['temp']['day'];
		$data['humidity'] = $var_json['list'][1]['humidity'];
		$data['date'] = date ('Y-m-d', $var_json['list']['1']['dt']);
		
		$this->load->view('welcome_vw',$data);
		}
	}

/**
*
* !!**!! ATTENTION ne pas mettre d'echo, sinon pollue le JSON  !!**!!
*
*/
	public function lirebouton($format='tab',$sortie='json'){

		if($format=='tab'){

		}else{
			$data = $this->p_lireFileJson ('les_boutons');
		}

		if($sortie=='json'){
			echo $data; // encode => transforme en tab PHP
		}else
		{
			echo $data;
		}
	}



	//:::::::::::   PRIVATE  :::::::::::::::
	/*
	* Description des bouton en dur
	* pour rapidité
	*/
	private function p_boutonTab(){

		$mesBoutons = "";
		return '';
	}


/**
*  Lecture des fichiers dans le dossier Json
*/
	private function p_lireFileJson($nom){

		$pathFile = './assets/json/'.$nom.'.json';
	
		if (file_exists($pathFile)){
		
			$this->load->helper('file');
			$contenu = read_file ($pathFile);

			return $contenu;
		}else{
		
			return false;
		}
	}
}
