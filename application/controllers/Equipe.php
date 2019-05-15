<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//Todo controller do codeigniter precisa extender (ser filho)
//da classe CI_Controller
class Equipe extends CI_Controller {

    public function __construct() {
        //chama o contrutor da classe pai CI_Controller
        parent::__construct();
        $this->load->model('Equipe_Model');
        //chama o método que faz a validação de login de usuário
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $data['equipes'] = $this->Equipe_Model->getAll('*,(SELECT COUNT(id_equipe) FROM integrante WHERE id_equipe=equipe.id) as membros');
        $this->load->view('Header');
        $this->load->view('ListaEquipes', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('Nome', 'Nome', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Header');
            $this->load->view('FormularioEquipe');
            $this->load->view('Footer');
        } else {
            $data = array(
                'nome' => $this->input->post('Nome'),
            );
            if ($this->Equipe_Model->insert($data)) {
                $this->session->set_flashdata('retorno', '<div class="alert alert-success">Equipe cadastrada com sucesso</div>');
                redirect('Equipe/listar');
            } else {
                $this->session->set_flashdata('retorno', '<div class="alert alert-danger">Erro ao cadastrar Equipe!!!</div>');
                redirect('Equipe/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->form_validation->set_rules('Nome', 'Nome', 'required');
            if ($this->form_validation->run() == false) {
                $data['equipe'] = $this->Equipe_Model->getOne($id);
                $this->load->view('Header');
                $this->load->view('FormularioEquipe', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'nome' => $this->input->post('Nome'),
                );
                if ($this->Equipe_Model->update($id, $data)) {
                    $this->session->set_flashdata('retorno', '<div class="alert alert-success">Equipe alterada com sucesso!</div>');
                    redirect('Equipe/listar');
                } else {
                    $this->session->set_flashdata('retorno', '<div class="alert alert-danger">Falha ao alterar Equipe...</div>');
                    redirect('Equipe/alterar/' . $id);
                }
            }
        } else {
            redirect('Equipe/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {
            if ($this->Equipe_Model->delete($id)) {
                $this->session->set_flashdata('retorno', '<div class="alert alert-success">Equipe deletada com sucesso!</div>');
            } else {
                $this->session->set_flashdata('retorno', '<div class="alert alert-danger">Falha ao Deletar Equipe...</div>');
            }
        }
        redirect('Equipe/listar');
    }

}
