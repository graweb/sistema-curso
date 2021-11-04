<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alunos_model extends CI_Model {

    function __construct() 
    {
        parent::__construct();
    }

    public function get()
    {
        return $this->db->get('tb_alunos')->result();
    }

    public function cadastrar()
    {
        $data_nascimento = strtr($this->input->post('datanascimento'), '/', '-');

        return $this->db->insert('tb_alunos',array(
            'fkidusuario'=>$this->input->post('fkidusuario', true),
            'celular'=>$this->input->post('celular', true),
            'nivel'=>$this->input->post('nivel', true),
            'datanascimento'=>date('Y-m-d', strtotime($data_nascimento)),
            'cep'=> $this->input->post('cep'),
            'uf'=>$this->input->post('uf', true),
            'estado'=>$this->input->post('estado', true),
            'cidade'=>$this->input->post('cidade', true),
            'bairro'=>$this->input->post('bairro', true),
            'tipologradouro'=>$this->input->post('tipologradouro', true),
            'logradouro'=>$this->input->post('logradouro', true),
        ));
    }

    public function atualizar($id)
    {
        $data_nascimento = strtr($this->input->post('datanascimento'), '/', '-');
        
        $this->db->where('idaluno', $id);
        return $this->db->update('tb_alunos',array(
            'fkidusuario'=>$this->input->post('fkidusuario', true),
            'celular'=>$this->input->post('celular', true),
            'nivel'=>$this->input->post('nivel', true),
            'datanascimento'=>date('Y-m-d', strtotime($data_nascimento)),
            'cep'=> $this->input->post('cep'),
            'uf'=>$this->input->post('uf', true),
            'estado'=>$this->input->post('estado', true),
            'cidade'=>$this->input->post('cidade', true),
            'bairro'=>$this->input->post('bairro', true),
            'tipologradouro'=>$this->input->post('tipologradouro', true),
            'logradouro'=>$this->input->post('logradouro', true),
            'atualizado_em' => date('Y-m-d H:i:s'),
        ));
    }

    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'idaluno';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;

        $idaluno = isset($_POST['idaluno']) ? strval($_POST['idaluno']) : '';
        $nome_aluno = isset($_POST['nome_aluno']) ? strval($_POST['nome_aluno']) : '';

        //$this->db->select('*');
        //$this->db->from('tb_alunos');
        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->like('idaluno', $idaluno);
        $this->db->like('nome_aluno', $nome_aluno);

        $criteria = $this->db->get('vw_alunos');

        $result = array();
        $result['total'] = $this->db->get('vw_alunos')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'idaluno'=>$data['idaluno'],
                'fkidusuario'=>$data['fkidusuario'],
                'nome_aluno'=>$data['nome_aluno'],
                'celular'=>$data['celular'],
                'nivel'=>$data['nivel'],
                'datanascimento'=>$data['datanascimento'],
                'cep'=>$data['cep'],
                'uf'=>$data['uf'],
                'cidade'=>$data['cidade'],
                'bairro'=>$data['bairro'],
                'tipologradouro'=>$data['tipologradouro'],
                'logradouro'=>$data['logradouro'],
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}