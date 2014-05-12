<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() //ok => Menu principales
	{
		$data['title']= 'Tableau de bord';
		$data['erreur']="";
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
	public function meteo_api($ville='caen',$sortie='txt')
	{
		$data['erreur']="";

		$url = 'api.openweathermap.org/data/2.5/forecast/city?q='.$ville.',fr&units=metric&mode=json'; // ou switchcmd=Off
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);

		$c = curl_exec($ch);
		curl_close($ch); 
		$var_json = json_decode($c, true);
		
		switch ($sortie) {
			case 'debug':
				echo '<pre>';
				var_dump($c);
				var_dump($var_json);
				die();
			break;
			
			case 'json':
				$data['meteo']=$var_json['list'];
				$data['ville'] = $var_json['city']['name'];
				$data['pressure'] = $var_json['list'][1]['pressure'];
				$data['temp'] = $var_json['list'][1]['temp']['day'];
				$data['humidity'] = $var_json['list'][1]['humidity'];
				$data['date'] = date ('Y-m-d', $var_json['list']['1']['dt']);
				
				$this->load->view('welcome_vw',$data);

			break;

			case 'file':
				if (!write_file('./assets/json/meteo_dump.json',$c))
				{
					$data['erreur']="Erreur ecriture file meteo_dump.json";
					$this->load->view('error_vw',$data);
				}else{
					redirect(base_url()+'/index.php/modules/meteo');
				}
			break;

			default:
				$data['erreur']="Erreur ecriture file dump.json";
				$this->load->view('error_vw',$data);
			break;
		}
		
	}


/**
* !!**!! ATTENTION ne pas mettre d'echo, sinon pollue le JSON  !!**!!
* permet de lire le fichier meteo mis en cache => pour demo
*/
	public function lireFileMeteo($sortie='json'){

		
		$data = $this->p_lireFileJson ('meteo_dump');
		

		switch ($sortie) {
			case 'text':
				$obj_json=json_decode($data);
				var_dump($obj_json);
				break;

			case 'debug':
				var_dump($data);die();
				break;
			default:
				echo $data;
				break;
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

		
		switch ($sortie) {
			case 'text':
				echo( json_decode($data));
				break;

			case 'debug':
				var_dump($data);die();
				break;
			default:
				echo $data;
				break;
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

		switch ($sortie) {
			case 'text':
				echo( json_decode($data));
				break;

			case 'debug':
				var_dump($data);die();
				break;
			default:
				echo $data;
				break;
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

		switch ($sortie) {
			case 'text':
				echo( json_decode($data));
				break;

			case 'debug':
				var_dump($data);die();
				break;
			default:
				echo $data;
				break;
		}
	}


	/*
	*  Recupere les infoDomoticz via requete HTTP
	*/
	public function lireScenes($sortie='json'){		
		
		$url=prefrences("domoticz").'json.htm?type=scenes';
		//var_dump($url);
		$data = curl_json($url); //var_dump($data);die();

		switch ($sortie) {
			case 'text':
				echo( json_decode($data));
				break;

			case 'debug':
				var_dump($data);die();
				break;
			default:
				echo $data;
				break;
		}
     }


	/**
	*  Recupere tous les modules de DOMMOTICZ dans un fichier JSON
	*  Permet de lire les modules sans interroger Domoticz
	*/
	public function domo_dump(){ //OK
		
		$this->load->helper('file');
		$this->load->helper('url');

		$content = curl_json( prefrences("domoticz").'json.htm?type=devices&filter=switchlight&used=true&order=Name');
		//var_dump($content);
		if (!write_file('./assets/json/domoticz_dump.json',$content))
		{
			$data['erreur']="Erreur ecriture file dump.json";
			$this->load->view('error_vw',$data);
		}else{
			redirect(base_url());
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
