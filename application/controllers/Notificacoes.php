<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notificacoes extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('notificacoes_model', '', TRUE);
    }

    // PÁGINA DE USUÁRIOS
	public function index()
	{
        $this->load->model('usuarios_model');
        $this->data['dados_usuario_notificacao'] = $this->usuarios_model->get();
		$this->load->view('cadastros/notificacoes/notificacoes', $this->data);
	}

    // LISTAR
    public function listar()
    {
        echo $this->notificacoes_model->getJson();
    }

    // CADASTRAR
    public function cadastrar()
    {
        if(!isset($_POST))
            show_404();
        
        if($this->notificacoes_model->cadastrar())
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('errorMsg'=>' Falha ao cadastrar os dados'));
    }

    // ATUALIZAR
    public function atualizar($id)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->notificacoes_model->atualizar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('errorMsg'=>' Falha ao cadastrar os dados'));
    }

    // CANCELAR
    public function cancelar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->notificacoes_model->cancelar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('errorMsg'=>' Falha ao cadastrar os dados'));
    }
}