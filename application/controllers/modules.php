<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modules extends CI_Controller {

	public function index(){
		
		
		$data['contenu'] = '-----';
		
		$this->load->view('modules_vw',$data);
		
        }
	
	public function montest(){
		
		$this->load->helper('file');
		$contenu = read_file ('./assets/json/pieces.json');
		
		echo $contenu;
		
		
        }

        
}