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
        $this->load->model('Integrante_Model', 'em');
        $data['integrantes'] = $this->em->getAll('*,(SELECT nome FROM equipe WHERE equipe.id=id_equipe) as equipe');
        $this->load->view('Header');
        $this->load->view('ListaIntegrantes', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Header');
            $this->load->view('FormularioIntegrante');
            $this->load->view('Footer');
        } else {
            $this->load->model('Integrante_Model');
            $data = array(
                'nome' => $this->input->post('nome'),
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
            if ($this->form_validation->run() == false) {
                $data['equipe'] = $this->Integrante_Model->getOne($id);
                $this->load->view('Header');
                $this->load->view('FormularioIntegrante', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
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
