<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() //ok => Menu principales
	{
		$data['title']= 'Tableau de bord';
		$this->load->view('test_vw',$data);
		//$this->meteo_api('caen','txt');
	}
	
	/*
	*   AFFICHE la liste des pieces
	*/
	public function affichepieces() 
	{
		$data['title']= 'Liste des pièces';
		$this->load->view('pieces_vw',$data);
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
*  Lecture d'un fichier  JSON
* !!**!! ATTENTION ne pas mettre d'echo, sinon pollue le JSON  !!**!!
*/
	public function lirebouton($format='tab',$sortie='json'){ //ok

		if($format=='tab'){
			// lire à partir d'un tableau
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


	/**
	*  Lecture d'un fichier  JSON
	* !!**!! ATTENTION ne pas mettre d'echo, sinon pollue le JSON  !!**!!
	*/
	public function lirepieces($format='tab',$sortie='json'){ 

		if($format=='tab'){
			// lire à partir d'un tableau
		}else{
			$data = $this->p_lireFileJson ('pieces');
		}

		if($sortie=='json'){
			echo $data; // encode => transforme en tab PHP
		}else
		{
			echo $data;
		}
	}

	/**
	* !!**!! ATTENTION ne pas mettre d'echo, sinon pollue le JSON  !!**!!
	*/
	public function lireFileDomo($format='tab',$sortie='json'){

		if($format=='tab'){
			// lire à partir d'un tableau
		}else{
			$data = $this->p_lireFileJson ('domoticz_dump');
		}

		if($sortie=='json'){
			echo $data; // encode => transforme en tab PHP
		}else
		{
			echo $data;
		}
	}


	/*
	*  Recupere les infoDomoticz via requete HTTP
	*/
	public function lireScenes($sortie='json'){		
		
		$url='http://192.168.0.66:8080/json.htm?type=scenes';
		$data = curl_json($url); var_dump($data);

		if($sortie=='json'){
			echo $data; // encode => transforme en tab PHP
		}else
		{
			echo $data;
		}
     }


	/**
	*  Recupere tous les modules de DOMMOTICZ dans un fichier JSON
	*  Permet de lire les modules sans interroger Domoticz
	*/
	public function domo_dump(){ //OK
		
		$this->load->helper('file');
		$this->load->helper('url');

		$content = curl_json('http://192.168.0.66:8080/json.htm?type=devices&filter=switchlight&used=true&order=Name');
		//var_dump($content);
		write_file('./assets/json/domoticz_dump.json',$content);

		redirect(base_url());
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

 private function p_lireFileJson($nom){ //ok

		$pathFile = './assets/json/'.$nom.'.json';
		
		if (file_exists($pathFile)){
			
			$contenu = read_file ($pathFile);
			return $contenu;
		}else{
		
			return false;
		}
	}
}
