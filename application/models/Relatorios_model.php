<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relatorios_model extends CI_Model {

    function __construct() 
    {
        parent::__construct();
    }

    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'idrelatorio';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;

        $idrelatorio = isset($_POST['idrelatorio']) ? strval($_POST['idrelatorio']) : '';
        $descricaorelatorio = isset($_POST['descricaorelatorio']) ? strval($_POST['descricaorelatorio']) : '';

        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->like('idrelatorio', $idrelatorio);
        $this->db->like('descricaorelatorio', $descricaorelatorio);

        $criteria = $this->db->get('tb_relatorios');

        $result = array();
        $result['total'] = $this->db->get('tb_relatorios')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'idrelatorio'=>$data['idrelatorio'],
                'descricaorelatorio'=>$data['descricaorelatorio']
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }

    public function getJsonAgendaDoProfessor($professor = null, $de = null, $ate = null)
    {
        $nome = explode("%20", $professor);
        $diade = str_replace('-', '/', $de);
        $diaate = str_replace('-', '/', $ate);

        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'idagenda';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;

        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->where('professor', $nome[0].' '.$nome[1]);
        $this->db->where('dia >=', $diade);
        $this->db->where('dia <=', $diaate);

        $criteria = $this->db->get('vw_agenda');

        $result = array();
        $result['total'] = $this->db->get('vw_agenda')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'idagenda'=>$data['idagenda'],
                'nome_aluno'=>$data['nome_aluno'],
                'dia'=>$data['dia'],
                'horainicio'=>$data['horainicio'],
                'horafim'=>$data['horafim']
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }

    public function getJsonMateriaAplicadaPorAluno($idusuario = null, $de = null, $ate = null)
    {
        $diade = str_replace('-', '/', $de);
        $diaate = str_replace('-', '/', $ate);

        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'idagenda';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;

        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->where('fkidusuario', $idusuario);
        $this->db->where('dia >=', $diade);
        $this->db->where('dia <=', $diaate);

        $criteria = $this->db->get('vw_agenda');

        $result = array();
        $result['total'] = $this->db->get('vw_agenda')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'idagenda'=>$data['idagenda'],
                'nome_aluno'=>$data['nome_aluno'],
                'professor'=>$data['professor'],
                'dia'=>$data['dia'],
                'horainicio'=>$data['horainicio'],
                'horafim'=>$data['horafim'],
                'materia'=>$data['materia'],
                'fala'=>$data['fala'],
                'audicao'=>$data['audicao'],
                'leitura'=>$data['leitura'],
                'escrita'=>$data['escrita']
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }

    public function getJsonBloqueioDeAulas($professor = null, $de = null, $ate = null)
    {
        $nome = explode("%20", $professor);
        $diade = str_replace('-', '/', $de);
        $diaate = str_replace('-', '/', $ate);

        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'idagenda';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;

        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->where('professor', $nome[0].' '.$nome[1]);
        $this->db->where('dia >=', $diade);
        $this->db->where('dia <=', $diaate);

        $criteria = $this->db->get('vw_relatorio_bloqueio_agenda');

        $result = array();
        $result['total'] = $this->db->get('vw_relatorio_bloqueio_agenda')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'idagenda'=>$data['idagenda'],
                'professor'=>$data['professor'],
                'dia'=>$data['dia'],
                'horainicio'=>$data['horainicio'],
                'horafim'=>$data['horafim']
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }

    public function getJsonPacotesPorAluno($idusuario = null)
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'idalunopacote';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;

        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->where('fkidusuario', $idusuario);

        $criteria = $this->db->get('vw_alunos_pacote');

        $result = array();
        $result['total'] = $this->db->get('vw_alunos_pacote')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'idalunopacote'=>$data['idalunopacote'],
                'nome_aluno_pacote'=>$data['nome_aluno_pacote'],
                'creditohoras'=>$data['creditohoras'],
                'horasconsumidas'=>$data['horasconsumidas'],
                'validade'=>$data['validade']
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}