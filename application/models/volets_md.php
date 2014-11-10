<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Volets_md extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}


	/**
	* !!**!! ATTENTION ne pas mettre d'echo, sinon pollue le JSON  !!**!!
	*/
	public function lireFileVolets($sortie='json'){

	
			$this->load->model('File_json_md');
			$data = $this->File_json_md->p_lireFileJson ('volets');
		
		switch ($sortie) {
			case 'json':
				return  json_decode($data,true);
				break;

			case 'debug':
				var_dump($data);die();
				break;
			default:
				echo $data;
				break;
		}
	}
}

?>