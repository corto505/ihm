<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	* Ecran pour afficher les boutons rapde, pour un acces rapide
	* ce fait par une lecture de fichier Json
	*/

	/**public function index(){ //erreur temporaire le temps de trouver une solution
		echo '** Error : time out ***'; die();
	}*/
	public function index(){ 

		$this->load->model('File_json_md');
		$data = $this->File_json_md->p_lireFileJson ('boutons_rapide');
		//var_dump($data);die();
		$montab = json_decode($data,true);
		$data = array ('title' =>'Menu tablette',
				'leType' => 'accueil',
				'erreur' => '',
				'tdb' => array(),
				'menu'=> array()
				);

		$data['btn_tdb'] = $montab['btn'];

		$this->load->view('btn_rapide_vw',$data);
	}

	/**
	* Ecran pour phone avec Angularjs
	*/
	public function phone(){ 

		$data = array ('title' =>'Menu tablette',
				'leType' => 'Light',
				'erreur' => '',
					);

		$this->load->view('phone_vw',$data);
	}

	/**
	*  Rassemble les menus Tablette , general, et volets dans une seules page
	* avec des onglets 11/09/2014
	*/
	public function tableau_central(){

		$data = array ('title' =>'Menu tablette',
				'leType' => 'accueil',
				'erreur' => '',
				);

		// Creation du premier Onglet = Btn rapide 
		$this->load->model('File_json_md');
		$data_btn = $this->File_json_md->p_lireFileJson ('boutons_rapide');
		//var_dump($data);die();
		$montab = json_decode($data_btn,true);
		$data['btn_tdb'] = $montab['btn'];

		
		// Creation du premier Onglet = Btn rapide 
		$this->load->model('Volets_md');
		$montTabJson = $this->Volets_md->lireFileVolets('json');

		$data['les_volets']=$montTabJson;

		$this->load->view('menu_tab_vw',$data);
	}


	/**
	*  Permet de tester le service
	*  http://192.168.0.66:8090/ihm/index.php/welcome/test_ping
	*/
	public function test_ping(){
		echo(  json_encode('resultat ok'));

	}

	/**
	*  Pour la page relai et la tablette, recharge la page
	* pour garder le wifi actif
	*/
	public function reload_page(){
			echo (' Last update : '. date('Y-m-d H:i:s'));

	}

	/**
	*  Permet de lire un flux RSS sur un site
	* et de le mettre en forme => Appel Ajax
	*/
	public function read_rss(){

			$curl = curl_init();
			curl_setopt ($curl,CURLOPT_URL,"http://www.lepoint.fr/rss.xml");
			curl_setopt ($curl,CURLOPT_RETURNTRANSFER,true);

			$content = curl_exec($curl);
			//$content = simplexml_load_file("http://www.lepoint.fr/rss.xml");
			$xml = new simpleXMLELEMENT($content);
			//echo '<pre>';var_dump($xml);die('xxxx');
			echo('<ul>');
			foreach($xml->channel->item as $val){
				echo('<li>'.$val->title.'<p>'.$val->description.'</p></li>');
			}
			echo('</ul>');
		//	$this->load->view('onglet_vw',$data);
	}


	public function menu() //ok => Menu principales voir controller tablette 2n solution
	{
		/**
		* 04/06/2014 :voir Ctrl Tablette chgt de strategie, les btn sont affiché via phh et non angulars
		* Pb de performance sut tablette 7"
		*/
		
		$data = array ('title' =>'Menu principale',
				'leType' => 'accueil',
				'erreur' => '',
				'tdb' => array(),
				'menu'=> array()
				);

		$this->load->view('test_vw',$data);
	}

	/*
	*   AFFICHE la liste des pieces
	*/
	public function affichepieces() 
	{
		$data['title']= 'Liste des pièces';
		$data['leType']= 'pièces';
		$this->load->view('pieces_vw',$data);
		//$this->meteo_api('caen','txt');
	}

	/*
	*   AFFICHE La page pour google API speech
	*/
	public function speech() 
	{
		$data['title']= 'Sunthèse vocale';
		$data['leType']= 'voix';
		$this->load->view('speech_vw',$data);
		//$this->meteo_api('caen','txt');
	}

	/**
	 *  Interogation API OpnMeteo
	 **/
	public function meteo_api($ville='caen',$sortie='txt')
	{
		$data['erreur']="";
		$data['leType']= '';

		$url = 'api.openweathermap.org/data/2.5/forecast/city?q='.$ville.',fr&units=metric&mode=json'; // ou switchcmd=Off
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);

		$c = curl_exec($ch);
		curl_close($ch); 
		$var_json = json_decode($c, true);
		
		//*********  Aiguillage des sorties  ***********
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

		$this->load->model('File_json_md');
		$data = $this->File_json_md->p_lireFileJson ('meteo_dump');
		
		//*********  Aiguillage des sorties  ***********
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
			$this->load->model('File_json_md');
			$data = $this->File_json_md->p_lireFileJson ('les_boutons');
		}
		
		//*********  Aiguillage des sorties  ***********
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
			$this->load->model('File_json_md');
			$data = $this->File_json_md->p_lireFileJson ('pieces');
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
			$this->load->model('File_json_md');
			$data = $this->File_json_md->p_lireFileJson ('domoticz_dump');
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
	*  Angular - 
	*/
	public function lireScenes($sortie='json'){		
		
		$url=prefrences("domoticz").'json.htm?type=scenes';
		//var_dump($url);
		$data = curl_json($url); //var_dump($data);die();

		switch ($sortie) {
			case 'json':
				echo $data;
				break;

			case 'debug':
				var_dump($data);die();
				break;
			default:
				echo '<pre>'.$data.'</pre>';
				break;
		}
     }


	/**
	*  Recupere tous les modules de DOMMOTICZ dans un fichier JSON
	*  Permet de lire les modules sans interroger Domoticz
	*/
	public function domo_dump(){ //OK
		
		$data['leType']= '';
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

 	//:::::::::::   TEST  :::::::::::::::

public function tps_reel(){

	$data['title']= 'temps reel';
	$data['leType']= 'socket';
	$this->load->view('socket_vw.php',$data);

}


}