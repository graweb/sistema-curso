<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alunos extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('alunos_model', '', TRUE);
    }

    // PÁGINA DE USUÁRIOS
	public function index()
	{
        $this->load->model('usuarios_model');
        $this->data['dados_usuario'] = $this->usuarios_model->get();
		$this->load->view('cadastros/alunos/alunos', $this->data);
	}

    // LISTAR
    public function listar()
    {
        echo $this->alunos_model->getJson();
    }

    // CADASTRAR
    public function cadastrar()
    {
        if(!isset($_POST))
            show_404();
        
        if($this->alunos_model->cadastrar())
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // ATUALIZAR
    public function atualizar($id)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->alunos_model->atualizar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // DESATIVAR
    public function desativar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->alunos_model->desativar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }
}