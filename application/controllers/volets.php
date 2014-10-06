<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Volets extends CI_Controller {

	public function index(){
		$this->load->model('Volets_md');
		$montTabJson = $this->Volets_md->lireFileVolets('json');

		$data = array ('title' =>'Menu tablette',
				'leType' => 'volets',
				'erreur' => ''
				);
		$data['les_volets']=$montTabJson;

		$this->load->view('volets_vw',$data);
	}


/**
*  permet de demander une impulsion plus ou moins courte à un relai
*/
public function relai_pulse($id_volet,$delai=300){

	if($id_volet>=1 and $id_volet<=16) {
		
		$url=prefrences("nodejs").'relai/'.$id_volet.'/On/'.$delai; //envoi cde vers nodejs
			//echo '<br> modules : URL = '.$url;
		$content = curl_json($url);
	}else{
		$content = "Err : pulse_relai";
	}
	//var_dump($content);die();
	//return $content;

}


/**
* permet de faire fonctionner plusieurs volets dans la meme commande
* @@ quoi : All-auto | all-manuel | milieu
* @@ param : haut | stop | bas | milieu | stop
*/
public function volet_action_groupe($quoi,$ordre){

	$controle_ordre = array('haut','bas','stop','milieu');
	if(in_array($ordre, $controle_ordre)){

		//on recupere la description des relais
		$this->load->model('Volets_md');
		$montTabJson = $this->Volets_md->lireFileVolets('json');
		//echo '<pre>';var_dump($montTabJson);die();
		$vlGauche=$montTabJson[0];
		$vlDroite=$montTabJson[1];
		$vlEntree=$montTabJson[2];
		$vlCuisine=$montTabJson[3];

		if ($ordre != 'milieu'){

			switch ($quoi) {
				case 'all-auto': // Pour des raison de sécurité le volet porte entree est ignorée
					$result = $this->relai_pulse($vlGauche[$ordre]);
					$this->relai_pulse($vlDroite[$ordre]);
					$this->relai_pulse($vlCuisine[$ordre]);
					break;
				
				case 'all-manuel':// Attention : ** tous les volets sont fermés.
					$this->relai_pulse($vlGauche[$ordre]);
					$this->relai_pulse($vlDroite[$ordre]);
					$this->relai_pulse($vlEntree[$ordre]); 
					$this->relai_pulse($vlCuisine[$ordre]);
					break;

				case 'test-all';

					$this->all_relai();
					break;

				case 'portail'; // pour entrouvir la porte pieton

					$this->relai_pulse(8); //on ouvre une porte
					sleep(2);
					$this->relai_pulse(8);// on stop l'ouverture
					break;

				default:
					# code...
					break;
			}

		}else{


			$result = $this->relai_pulse($vlGauche['bas']);
			sleep(4);
			$result = $this->relai_pulse($vlGauche['stop']);

			$this->relai_pulse($vlDroite['bas']);
			sleep(4);
			$this->relai_pulse($vlDroite['stop']);

			$this->relai_pulse($vlCuisine['bas']);
			sleep(4);
			$this->relai_pulse($vlCuisine['stop']);

		}
	}

	return true;

}


/**
*  fait une boucle sur tous les relais
*/
private function all_relai(){
	//echo "string";
	/*for ($i=4; $i < 16; $i=$i+1) { 
		 $this->relai_pulse($i,400);
		 sleep(1);
	}

		 $this->relai_pulse(1,800);
		 $this->relai_pulse(2,800);
		 $this->relai_pulse(3,800);
		 $this->relai_pulse(4,800);
		 sleep(2);*/
		 $this->relai_pulse(5,800);
		 $this->relai_pulse(6,800);
		 $this->relai_pulse(7,800);
		 $this->relai_pulse(8,800);
		 sleep(2);
		 $this->relai_pulse(9,800);

}

/**
* permet d'envoyer une commande à un relai
* @@ param : $id_volet
* @@ param : $ordre : On|Off
*/
public function relai_tempo($id_volet,$ordre){

}


}
?>