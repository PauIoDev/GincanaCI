<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//Todo controller do codeigniter precisa extender (ser filho)
//da classe CI_Controller
class Equipe extends CI_Controller {

    public function __construct() {
        //chama o contrutor da classe pai CI_Controller
        parent::__construct();
        //chama o método que faz a validação de login de usuário
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('Equipe_Model', 'em');
        $data['equipes'] = $this->em->getAll();
        $this->load->view('Header');
        $this->load->view('ListaEquipes', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Header');
            $this->load->view('FormularioEquipe');
            $this->load->view('Footer');
        } else {
            $this->load->model('Equipe_Model');
            $data = array(
                'nome' => $this->input->post('nome'),
            );
            if ($this->Equipe_Model->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Equipe cadastrada com sucesso');
                redirect('Equipe/listar');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar Equipe!!!');
                redirect('Equipe/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->load->model('Equipe_Model');

            $this->form_validation->set_rules('nome', 'nome', 'required');
            if ($this->form_validation->run() == false) {
                $data['equipe'] = $this->Equipe_Model->getOne($id);
                $this->load->view('Header');
                $this->load->view('FormularioEquipe', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                );
                if ($this->Equipe_Model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Equipe alterada com sucesso!');
                    redirect('Equipe/listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Falha ao alterar Equipe...');
                    redirect('Equipe/alterar/' . $id);
                }
            }
        } else {
            redirect('Equipe/listar');
        }
    }
    public function deletar($id) {
        if ($id > 0) {
            $this->load->model('Equipe_Model');

            if ($this->Equipe_Model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Equipe deletada com sucesso!');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao Deletar Equipe...');
            }
        }
        redirect('Equipe/listar');
    }

}
