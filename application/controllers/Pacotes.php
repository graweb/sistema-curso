<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pacotes extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('pacotes_model', '', TRUE);
    }

    // PÁGINA DE USUÁRIOS
	public function index()
	{
        $this->load->model('usuarios_model');
        $this->data['dados_usuario_pacote'] = $this->usuarios_model->get();
		$this->load->view('cadastros/pacotes/pacotes', $this->data);
	}

    // LISTAR
    public function listar()
    {
        echo $this->pacotes_model->getJson();
    }

    // CADASTRAR
    public function cadastrar()
    {
        if(!isset($_POST))
            show_404();
        
        if($this->pacotes_model->cadastrar())
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // ATUALIZAR
    public function atualizar($id)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->pacotes_model->atualizar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // CANCELAR
    public function cancelar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->pacotes_model->cancelar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // CONFIRMAR
    public function confirmar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->pacotes_model->confirmar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // FINALIZAR
    public function finalizar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->pacotes_model->finalizar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }
}