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
            if ($this->Prova_Model->insert($data)) {
                  $this->session->set_flashdata('mensagem','Prova cadastrada com sucesso');
                redirect('Prova/listar');
            } else {
                 $this->session->set_flashdata('mensagem','Erro ao cadastrar Prova!!!');
                redirect('Prova/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->load->model('Prova_Model');

            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('tempo', 'tempo', 'required');
            $this->form_validation->set_rules('descricao', 'descricao', 'required');
            $this->form_validation->set_rules('nIntegrantes', 'nIntegrantes', 'required');

            if ($this->form_validation->run() == false) {
                $data['prova'] = $this->Prova_Model->getOne($id);
                $this->load->view('FormularioProva', $data);
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'tempo' => $this->input->post('tempo'),
                    'descricao' => $this->input->post('descricao'),
                    'nIntegrantes' => $this->input->post('nIntegrantes')
                );
                if ($this->Prova_Model->update($id, $data)) {
                     $this->session->set_flashdata('mensagem','Prova alterada com sucesso!');
                    redirect('Prova/listar');
                } else {
                    $this->session->set_flashdata('mensagem','Falha ao alterar Prova...');
                    redirect('Prova/alterar/' . $id);
                }
            }
        } else {
            redirect('Prova/listar');
        }
    }
public function deletar($id) {
        if ($id > 0) {
            $this->load->model('Prova_Model');

            if($this->Prova_Model->delete($id)) {
                $this->session->set_flashdata('mensagem',
                            'Prova deletada com sucesso!');                            
            } else {
                $this->session->set_flashdata('mensagem',
                            'Falha ao Deletar Prova...');
            }
        }
        redirect('Prova/listar');
    }
}
