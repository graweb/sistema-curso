<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notificacoes_model extends CI_Model {

    function __construct() 
    {
        parent::__construct();
    }

    public function get()
    {
        return $this->db->get('tb_notificacoes')->result();
    }

    public function cadastrar()
    {
        if($this->input->post('todosalunos') == true)
        {
            $query = $this->db->where('fkidpermissao', 3)->get('tb_usuarios');
            foreach ($query->result() as $row)
            {
                $this->db->insert('tb_notificacoes',array(
                    'fkidusuario'=>$row->idusuario,
                    'assunto'=>$this->input->post('assunto', true),
                    'mensagem'=>$this->input->post('mensagem', true)
                ));
            }

            return true;
        }
        else
        {
            return $this->db->insert('tb_notificacoes',array(
                'fkidusuario'=>$this->input->post('fkidusuario', true),
                'assunto'=>$this->input->post('assunto', true),
                'mensagem'=>$this->input->post('mensagem', true)
            ));
        }
    }

    public function atualizar($id)
    {
        $this->db->where('idnotificacao', $id);
        return $this->db->update('tb_notificacoes',array(
            'fkidusuario'=>$this->input->post('fkidusuario', true),
            'assunto'=>$this->input->post('assunto', true),
            'mensagem'=>$this->input->post('mensagem', true),
            'situacao'=>$this->input->post('situacao', true),
            'atualizado_em' => date('Y-m-d H:i:s'),
        ));
    }

    public function cancelar($id)
    {
        $this->db->where('idnotificacao', $id);
        return $this->db->update('tb_notificacoes',array(
            'situacao'=>$this->input->post('situacao_cancelar_situacao',true),
        ));
    }

    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'idnotificacao';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
        $offset = ($page-1) * $rows;

        $idnotificacao = isset($_POST['idnotificacao']) ? strval($_POST['idnotificacao']) : '';
        $nome_aluno_notificacao = isset($_POST['nome_aluno_notificacao']) ? strval($_POST['nome_aluno_notificacao']) : '';

        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->like('idnotificacao', $idnotificacao);
        $this->db->like('nome_aluno_notificacao', $nome_aluno_notificacao);

        $criteria = $this->db->get('vw_notificacoes');

        $result = array();
        $result['total'] = $this->db->get('vw_notificacoes')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'idnotificacao'=>$data['idnotificacao'],
                'fkidusuario'=>$data['fkidusuario'],
                'nome_aluno_notificacao'=>$data['nome_aluno_notificacao'],
                'assunto'=>$data['assunto'],
                'mensagem'=>$data['mensagem'],
                'situacao'=>$data['situacao']
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}