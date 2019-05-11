<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//Todo controller do codeigniter precisa extender (ser filho)
//da classe CI_Controller
class Integrante extends CI_Controller {

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
        $this->load->model('Integrante_Model', 'im');
        $data['integrantes'] = $this->im->getAll();
        $this->load->view('Header');
        $this->load->view('ListaIntegrantes', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('id_equipe', 'id_equipe', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->model('Equipe_Model', 'em');
            $data['equipes'] = $this->em->getAll();
            $this->load->view('Header');
            $this->load->view('FormularioIntegrante', $data);
            $this->load->view('Footer');
        } else {
            $this->load->model('Integrante_Model');
            $data = array(
                'nome' => $this->input->post('nome'),
                'id_equipe' => $this->input->post('id_equipe'),
                'data_nasc' => $this->input->post('data_nasc'),
                'rg' => $this->input->post('rg'),
                'cpf' => $this->input->post('cpf'),
            );
            if ($this->Integrante_Model->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Integrante cadastrado com sucesso');
                redirect('Integrante/listar');
            } else {
                $this->session->set_flashdata('mensagem', 'Erro ao cadastrar Integrante!!!');
                redirect('Integrante/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->load->model('Integrante_Model');
            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('id_equipe', 'id_equipe', 'required');
            if ($this->form_validation->run() == false) {
                $data['integrante'] = $this->Integrante_Model->getOne($id);
                $this->load->model('Equipe_Model', 'em');
                $data['equipes'] = $this->em->getAll();
                $this->load->view('Header');
                $this->load->view('FormularioIntegrante', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'id_equipe' => $this->input->post('id_equipe'),
                    'data_nasc' => $this->input->post('data_nasc'),
                    'rg' => $this->input->post('rg'),
                    'cpf' => $this->input->post('cpf')
                );
                if ($this->Integrante_Model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Integrante alterado com sucesso!');
                    redirect('Integrante/listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Falha ao alterar Integrante...');
                    redirect('Integrante/alterar/' . $id);
                }
            }
        } else {
            redirect('Integrante/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {
            $this->load->model('Integrante_Model');

            if ($this->Integrante_Model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Integrante deletado com sucesso!');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao Deletar Integrante...');
            }
        }
        redirect('Integrante/listar');
    }

}
