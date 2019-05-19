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
        $this->load->model('Equipe_Model');
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
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 100;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('imagem')) {
                $error = array('error'=>$this->upload->display_errors());
                $this->session->set_flashdata('retorno', '<div class="alert alert-danger"><i class="far fa-hand-paper"></i> ' . $this->upload->display_errors() . '</div>');
                    redirect(base_url('Equipe/cadastrar'));exit();
            }else{
                $data['imagem'] = $this->upload->data()['file_name'];
            }
            if ($this->Equipe_Model->insert($data)) {
                $this->session->set_flashdata('retorno', '<div class="alert alert-success"><i class="fas fa-check-double"></i> Equipe cadastrada com sucesso</div>');
                redirect('Equipe/listar');
            } else {
                unlink('./uploads/'.$data['imagem']);
                $this->session->set_flashdata('retorno', '<div class="alert alert-danger"><i class="far fa-hand-paper"></i> Erro ao cadastrar Equipe!!!</div>');
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
                $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 100;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('imagem')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('retorno', '<div class="alert alert-danger"><i class="far fa-hand-paper"></i> ' . $this->upload->display_errors() . '</div>');
                    redirect(base_url('Equipe/alterar'));exit();
            }else{
                 $data['imagem'] = $this->upload->data()['file_name'];
                    $actualimage = $this->Equipe_Model->getOne($id)->imagem;
                    if (!empty($actualimage) && file_exists('uploads/' . $actualimage)) 
                        unlink('uploads/' . $actualimage);
            }
                if ($this->Equipe_Model->update($id, $data)) {
                    $this->session->set_flashdata('retorno', '<div class="alert alert-success"><i class="fas fa-check-double"></i> Equipe alterada com sucesso!</div>');
                    redirect('Equipe/listar');
                } else {
                    $this->session->set_flashdata('retorno', '<div class="alert alert-danger"><i class="far fa-hand-paper"></i> Falha ao alterar Equipe...</div>');
                    redirect('Equipe/alterar/' . $id);
                }
            }
        } else {
            redirect('Equipe/listar');
        }
    }

        public function deletar($id) {
        $excluir = $this->Equipe_Model->getOne($id);
        if ($excluir) {
            if ($this->Equipe_Model->delete($id) > 0) {
                if (!empty($excluir->imagem) && file_exists('uploads/' . $excluir->imagem)) {
                    unlink('uploads/' . $excluir->imagem);
                }
                $this->session->set_flashdata('retorno', '<div class="alert alert-success"><i class="fas fa-check-double"></i> Equipe deletada com sucesso!</div>');
            } else {
                $this->session->set_flashdata('retorno', '<div class="alert alert-danger"><i class="far fa-hand-paper"></i> Falha ao Deletar Equipe...</div>');
            }
        } else {
            $this->session->set_flashdata('retorno', '<div class="alert alert-danger"><i class="far fa-hand-paper"></i> Equipe não encontrada</div>');
        }
        redirect('Equipe/listar');
    }
    public function mensagem() {
        $this->session->set_flashdata('retorno', '<div class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i> Não é possivel deletar equipes com integrantes cadastrados. Caso desejar deletar esta equipe exclua primeiramente os integrantes...</div>');
        redirect('Equipe/listar');
    }
}
