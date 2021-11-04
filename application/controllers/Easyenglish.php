<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Easyenglish extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('Easyenglish_model', '', TRUE);
    }

    // PÁGINA DE LOGIN
    public function index()
    {
        if(!isset($_SESSION['idusuario']) || !isset($_SESSION['logado']))
        {
            redirect('login');
        }
        
        $this->load->view('tema/tema');
    }

    // CARREGA O MENU DO SISTEMA
    public function menu()
    {
        $this->load->view('easyenglish/menu');
    }

    // CARREGA O CONTEÙDO DO PAINEL(DASHBOARD)
    public function painel()
    {
        $this->load->view('easyenglish/painel');
    }

    // CARREGA O RODAPÉ DO SISTEMA
    public function rodape()
    {
        $this->load->view('easyenglish/rodape');
    }

    // REDIRECIONA PARA A PÁGINA LOGIN
    public function login()
    {
        $this->load->view('easyenglish/login');
    }

    // SAI DO SISTEMA
    public function sair()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    // VERICA SE OS DADOS DE ACESSO ESTAO CORRETOS E FAZ O LOGIN
    public function autenticar()
    {
        $retorno = $this->Easyenglish_model->autenticar();

        switch ($retorno) {
            case 0:
                $this->session->set_flashdata('danger', 'Favor, preencha todos os campos!');
                redirect('login');
                break;
            case 1:
                $this->session->set_flashdata('danger', 'Usuário/Senha incorreto!');
                redirect('login');
                break;
            case 2:
                $this->session->set_flashdata('warning','Usuário desativado, favor entrar em contato com o suporte.');
                redirect('login');
                break;
            case 3:
                redirect(base_url());
                break;
        }
    }
}
