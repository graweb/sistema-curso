<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bloqueioaulas extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('bloqueioaulas_model', '', TRUE);
    }

    // PÁGINA DE USUÁRIOS
	public function index()
	{
        $this->load->model('usuarios_model');
        $this->data['dados_professores_list'] = $this->usuarios_model->getProfessores();
		$this->load->view('cadastros/bloqueioaulas/bloqueioaulas', $this->data);
	}

    // LISTAR
    public function listar()
    {
        echo $this->bloqueioaulas_model->getJson();
    }

    // CADASTRAR
    public function cadastrar()
    {
        if(!isset($_POST))
            show_404();
        
        if($this->bloqueioaulas_model->cadastrar())
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('errorMsg'=>' Falha ao cadastrar os dados'));
    }

    // CANCELAR
    public function cancelar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->bloqueioaulas_model->cancelar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('errorMsg'=>' Falha ao cadastrar os dados'));
    }

    // EXCLUIR
    public function excluir($id)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->bloqueioaulas_model->excluir($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('errorMsg'=>' Falha ao cadastrar os dados'));
    }
}