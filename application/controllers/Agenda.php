<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('agenda_model', '', TRUE);
    }

    // PÁGINA DE USUÁRIOS
	public function index()
	{
        $this->load->model('usuarios_model');
        $this->data['dados_aluno'] = $this->usuarios_model->getAlunos();
        $this->data['dados_professores'] = $this->usuarios_model->getProfessores();
		$this->load->view('cadastros/agenda/agenda', $this->data);
	}

    // LISTAR
    public function listar()
    {
        echo $this->agenda_model->getJson();
    }

    // CADASTRAR
    public function cadastrar()
    {
        if(!isset($_POST))
            show_404();
        
        if($this->agenda_model->cadastrar())
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('errorMsg'=>' Falha ao cadastrar os dados'));
    }

    // ATUALIZAR
    public function atualizar($id)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->agenda_model->atualizar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('errorMsg'=>' Falha ao cadastrar os dados'));
    }

    // CANCELAR
    public function cancelar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->agenda_model->cancelar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('errorMsg'=>' Falha ao cadastrar os dados'));
    }

    // CONFIRMAR
    public function confirmar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->agenda_model->confirmar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('errorMsg'=>' Falha ao cadastrar os dados'));
    }

    // FINALIZAR
    public function finalizar($idagenda = null)
    {
        if(!isset($_POST))
            show_404();
        if($this->agenda_model->finalizar($idagenda))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('errorMsg'=>' Falha ao cadastrar os dados'));
    }
}