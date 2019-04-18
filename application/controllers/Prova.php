<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Prova extends CI_Controller {

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('Prova_Model', 'pm');
        $data['provas'] = $this->pm->getAll();
        $this->load->view('ListaProvas', $data);
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('tempo', 'tempo', 'required');
        $this->form_validation->set_rules('descricao', 'descricao', 'required');
        $this->form_validation->set_rules('nIntegrantes', 'nIntegrantes', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('FormularioProva');
        } else {
            $this->load->model('Prova_Model');
            $data = array(
                'nome' => $this->input->post('nome'),
                'tempo' => $this->input->post('tempo'),
                'descricao' => $this->input->post('descricao'),
                'nIntegrantes' => $this->input->post('nIntegrantes')
            );
            if($this->Prova_Model->insert($data)){
                redirect('Prova/listar');
            }else {
                redirect('Prova/cadastrar');
            }
        }
    }

}
