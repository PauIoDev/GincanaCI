<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//Todo controller do codeigniter precisa extender (ser filho)
//da classe CI_Controller
class Pontuacao extends CI_Controller {

    public function __construct() {
        //chama o contrutor da classe pai CI_Controller
        parent::__construct();
        //chama o método que faz a validação de login de usuário
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
        $this->load->model('Pontuacao_Model');
    }

    public function index() {
        $this->listar();
    }

    public function listar() {        
        $data['pontuacoes'] = $this->Pontuacao_Model->getAll();
        $this->load->view('Header');
        $this->load->view('ListaPontuacoes', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('Equipe', 'Equipe', 'required');
        $this->form_validation->set_rules('Prova', 'Prova', 'required');
        $this->form_validation->set_rules('Pontos', 'Pontos', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->model('Equipe_Model', 'em');
            $data['equipes'] = $this->em->getAll();
            $this->load->model('Prova_Model', 'pm');
            $data['provas'] = $this->pm->getAll();

            $this->load->view('Header');
            $this->load->view('FormularioPontuacao', $data);
            $this->load->view('Footer');
        } else {
            $data = array(
                'id_equipe' => $this->input->post('Equipe'),
                'id_prova' => $this->input->post('Prova'),
                'id_usuario' => $this->session->userdata('idUsuario'),
                'pontos' => $this->input->post('Pontos'),
                'data_hora' => $this->input->post('data_hora'),
            );
            if ($this->Pontuacao_Model->insert($data)) {
                $this->session->set_flashdata('retorno', '<div class="alert alert-success"><i class="fas fa-check-double"></i> Pontuação cadastrada com sucesso</div>');
                redirect('Pontuacao/listar');
            } else {
                $this->session->set_flashdata('retorno', '<div class="alert alert-danger"><i class="far fa-hand-paper"></i> Falha ao cadastrar a Pontuação</div>');
                redirect('Pontuacao/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->form_validation->set_rules('Equipe', 'Equipe', 'required');
            $this->form_validation->set_rules('Prova', 'Prova', 'required');
            $this->form_validation->set_rules('Pontos', 'Pontos', 'required');

            if ($this->form_validation->run() == false) {
                $data['pontuacao'] = $this->Pontuacao_Model->getOne($id);
                $this->load->model('Equipe_Model', 'em');
                $data['equipes'] = $this->em->getAll();
                $this->load->model('Prova_Model', 'pm');
                $data['provas'] = $this->pm->getAll();

                $this->load->view('Header');
                $this->load->view('FormularioPontuacao', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'id_equipe' => $this->input->post('Equipe'),
                    'id_prova' => $this->input->post('Prova'),
                    'id_usuario' => $this->session->userdata('idUsuario'),
                    'pontos' => $this->input->post('Pontos'),
                    'data_hora' => $this->input->post('data_hora'),
                );
                if ($this->Pontuacao_Model->update($id, $data)) {
                    $this->session->set_flashdata('retorno', '<div class="alert alert-success"><i class="fas fa-check-double"></i> Pontuação alterada com sucesso</div>');
                    redirect('Pontuacao/listar');
                } else {
                    $this->session->set_flashdata('retorno', '<div class="alert alert-danger"><i class="far fa-hand-paper"></i> Falha ao alterar a Pontuação</div>');
                    redirect('Pontuacao/alterar/' . $id);
                }
            }
        } else {
            redirect('Pontuacao/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {
            if ($this->Pontuacao_Model->delete($id)) {
                $this->session->set_flashdata('retorno', '<div class="alert alert-success"><i class="fas fa-check-double"></i> Pontuação deletada com sucesso</div>');
            } else {
                $this->session->set_flashdata('retorno', '<div class="alert alert-danger"><i class="far fa-hand-paper"></i> Falha ao deletar a Pontuação</div>');
            }
        }
        redirect('Pontuacao/listar');
    }

    public function listarRank() {
        $data['pontuacoes'] = $this->Pontuacao_model->getRank();
        $this->load->view('Header');
        $this->load->view('ListaRank', $data);
        $this->load->view('Footer');
    }

}
