<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prova extends CI_Controller {
	public function index()
	{
		$this->listar();
                
	}
        public function listar(){
        $this->load->model('Prova_Model', 'pm');
        $data['provas'] = $this->pm->getAll();
        $this->load->view('ListaProvas', $data);
    }
        
}
