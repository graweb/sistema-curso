<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relatorios extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('relatorios_model', '', TRUE);
    }

    // PÁGINA DE RELATÓRIOS
	public function index()
	{
        $this->load->view('relatorios/relatorios');
	}

    // LISTAR
    public function listar()
    {
        echo $this->relatorios_model->getJson();
    }

    // FILTROS RELATÓRIOS
    public function filtro_relatorios($id)
    {
        switch ($id) {
            case 1:
                $this->load->model('usuarios_model');
                $this->data['dados_filtro_alunos'] = $this->usuarios_model->getAlunos();
                $this->load->view('relatorios/filtros/pacotes_por_aluno', $this->data);
                break;
            case 2:
                $this->load->model('usuarios_model');
                $this->data['dados_filtro_professor'] = $this->usuarios_model->getProfessores();
                $this->load->view('relatorios/filtros/agenda_do_professor', $this->data);
                break;
            case 3:
                $this->load->model('usuarios_model');
                $this->data['dados_filtro_alunos'] = $this->usuarios_model->getAlunos();
                $this->load->view('relatorios/filtros/materia_aplicada_por_aluno', $this->data);
                break;
            case 4:
                $this->load->model('usuarios_model');
                $this->data['dados_filtro_professor'] = $this->usuarios_model->getProfessores();
                $this->load->view('relatorios/filtros/bloqueio_de_aulas', $this->data);
                break;
            default:
                break;
        }
    }

    // AGENDA DO PROFESSOR
    public function agenda_do_professor($professor, $de, $ate)
    {
        $this->data['info_professor'] = $professor;
        $this->data['info_professor_de'] = $de;
        $this->data['info_professor_ate'] = $ate;
        $this->load->view('relatorios/conteudo/agenda_do_professor', $this->data);
    }

    // LISTAR AGENDA DO PROFESSOR
    public function listar_agenda_do_professor($professor, $de, $ate)
    {
        echo $this->relatorios_model->getJsonAgendaDoProfessor($professor, $de, $ate);
    }

    // MATÉRIA APLICADA POR ALUNO
    public function materia_aplicada_por_aluno($idaluno, $de, $ate)
    {
        $this->data['info_aluno'] = $idaluno;
        $this->data['info_aluno_de'] = $de;
        $this->data['info_aluno_ate'] = $ate;
        $this->load->view('relatorios/conteudo/materia_aplicada_por_aluno', $this->data);
    }

    // LISTAR MATÉRIA APLICADA POR ALUNO
    public function listar_materia_aplicada_por_aluno($idaluno, $de, $ate)
    {
        echo $this->relatorios_model->getJsonMateriaAplicadaPorAluno($idaluno, $de, $ate);
    }

    // BLOQUEIO DE AULAS
    public function bloqueio_de_aulas($professor, $de, $ate)
    {
        $this->data['info_professor'] = $professor;
        $this->data['info_professor_de'] = $de;
        $this->data['info_professor_ate'] = $ate;
        $this->load->view('relatorios/conteudo/bloqueio_de_aulas', $this->data);
    }

    // LISTAR BLOQUEIO DE AULAS
    public function listar_bloqueio_de_aulas($professor, $de, $ate)
    {
        echo $this->relatorios_model->getJsonBloqueioDeAulas($professor, $de, $ate);
    }

    // PACOTES POR ALUNO
    public function pacotes_por_aluno($idaluno)
    {
        $this->data['id_aluno_pacote'] = $idaluno;
        $this->load->view('relatorios/conteudo/pacotes_por_aluno', $this->data);
    }

    // LISTAR PACOTES POR ALUNO
    public function listar_pacotes_por_aluno($idaluno)
    {
        echo $this->relatorios_model->getJsonPacotesPorAluno($idaluno);
    }
}