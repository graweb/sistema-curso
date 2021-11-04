<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exercicios extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('exercicios_model', '', TRUE);
    }

    // PÁGINA DE USUÁRIOS
	public function index()
	{
		$this->load->view('cadastros/exercicios/exercicios');
	}

    // LISTAR
    public function listar()
    {
        echo $this->exercicios_model->getJson();
    }

    // CADASTRAR
    public function cadastrar($tipo)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->exercicios_model->cadastrar($tipo))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('errorMsg'=>' Falha ao cadastrar os dados'));
    }

    // ATUALIZAR
    public function atualizar($id)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->exercicios_model->atualizar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('errorMsg'=>' Falha ao cadastrar os dados'));
    }

    // CANCELAR
    public function cancelar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->exercicios_model->cancelar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('errorMsg'=>' Falha ao cadastrar os dados'));
    }

    // ATIVAR/DESATIVAR
    public function desativar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->exercicios_model->desativar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }
}