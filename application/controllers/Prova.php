<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Prova extends CI_Controller {

    public function __construct() {
        //chama o contrutor da classe pai CI_Controller
        parent::__construct();
        //chama o método que faz a validação de login de usuário
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
        $this->load->model('Prova_Model');
    }

    public function index() {
        $this->listar();
    }

    public function listar() {        
        $data['provas'] = $this->Prova_Model->getAll();
        $this->load->view('Header');
        $this->load->view('ListaProvas', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('Nome', 'Nome', 'required');
        $this->form_validation->set_rules('Tempo', 'Tempo', 'required');
        $this->form_validation->set_rules('Descrição', 'Descrição', 'required');
        $this->form_validation->set_rules('NºIntegrantes', 'NºIntegrantes', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Header');
            $this->load->view('FormularioProva');
            $this->load->view('Footer');
        } else {
            $data = array(
                'nome' => $this->input->post('Nome'),
                'tempo' => $this->input->post('Tempo'),
                'descricao' => $this->input->post('Descrição'),
                'NIntegrantes' => $this->input->post('NºIntegrantes')
            );
            if ($this->Prova_Model->insert($data)) {
                $this->session->set_flashdata('retorno', '<div class="alert alert-success"><i class="fas fa-check-double"></i> Prova cadastrada com sucesso</div>');
                redirect('Prova/listar');
            } else {
                $this->session->set_flashdata('retorno', '<div class="alert alert-danger"><i class="far fa-hand-paper"></i> Erro ao cadastrar Prova!!!</div>');
                redirect('Prova/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->form_validation->set_rules('Nome', 'Nome', 'required');
            $this->form_validation->set_rules('Tempo', 'Tempo', 'required');
            $this->form_validation->set_rules('Descrição', 'Descrição', 'required');
            $this->form_validation->set_rules('NºIntegrantes', 'NºIntegrantes', 'required');
            if ($this->form_validation->run() == false) {
                $data['prova'] = $this->Prova_Model->getOne($id);
                $this->load->view('Header');
                $this->load->view('FormularioProva', $data);
                $this->load->view('Footer');
                
            } else {
                $data = array(
                    'nome' => $this->input->post('Nome'),
                    'tempo' => $this->input->post('Tempo'),
                    'descricao' => $this->input->post('Descrição'),
                    'NIntegrantes' => $this->input->post('NºIntegrantes')
                );
                if ($this->Prova_Model->update($id, $data)) {
                    $this->session->set_flashdata('retorno', '<div class="alert alert-success"><i class="fas fa-check-double"></i> Prova alterada com sucesso!</div>');
                    redirect('Prova/listar');
                } else {
                    $this->session->set_flashdata('retorno', '<div class="alert alert-danger"><i class="far fa-hand-paper"></i> Falha ao alterar Prova...</div>');
                    redirect('Prova/alterar/' . $id);
                }
            }
        } else {
            redirect('Prova/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {
            if ($this->Prova_Model->delete($id)) {
                $this->session->set_flashdata('retorno', '<div class="alert alert-success"><i class="fas fa-check-double"></i> Prova deletada com sucesso!</div>');
            } else {
                $this->session->set_flashdata('retorno', '<div class="alert alert-danger"><i class="far fa-hand-paper"></i> Falha ao Deletar Prova...</div>');
            }
        }
        redirect('Prova/listar');
    }

}
