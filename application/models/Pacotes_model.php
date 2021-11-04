<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pacotes_model extends CI_Model {

    function __construct() 
    {
        parent::__construct();
    }

    public function get()
    {
        return $this->db->get('tb_alunos_pacote')->result();
    }

    public function cadastrar()
    {
        // VERIFICA SE O ALUNO TEM ALGUM SALDO
        $this->db->where('fkidusuario', $this->input->post('fkidusuario'));
        $this->db->where('situacao', 1);
        $saldo = $this->db->get('tb_alunos_pacote')->row();

        if(is_null($saldo))
        {
            return $this->db->insert('tb_alunos_pacote',array(
                'fkidusuario'=>$this->input->post('fkidusuario', true),
                'creditohoras'=>$this->input->post('creditohoras'),
                'horasconsumidas'=>$this->input->post('horasconsumidas', true),
                'validade' => date('Y-m-d', strtotime('+31 days')),
            ));
        }
        else
        {
            // CALCULA O SALDO
            $totsaldo = $saldo->creditohoras + $this->input->post('creditohoras');

            $this->db->insert('tb_alunos_pacote',array(
                'fkidusuario'=>$this->input->post('fkidusuario', true),
                'creditohoras'=>$totsaldo,
                'horasconsumidas'=>$this->input->post('horasconsumidas', true),
                'validade' => date('Y-m-d', strtotime('+31 days')),
            ));

            $this->db->where('fkidusuario', $this->input->post('fkidusuario', true));
            $this->db->where('situacao', 1);
            return $this->db->update('tb_alunos_pacote',array(
                'horasconsumidas'=>$saldo->creditohoras,
                'situacao'=>2,
                'atualizado_em'=>date('Y-m-d H:i:s'),
            ));
        }
    }

    public function atualizar($id)
    {
        $this->db->where('idalunopacote', $id);
        return $this->db->update('tb_alunos_pacote',array(
            'fkidusuario'=>$this->input->post('fkidusuario', true),
            'creditohoras'=>$this->input->post('creditohoras', true),
            'horasconsumidas'=>$this->input->post('horasconsumidas', true),
            'validade' => date('Y-m-d', strtotime('+31 days')),
            'atualizado_em' => date('Y-m-d H:i:s'),
        ));
    }

    public function cancelar($id)
    {
        $this->db->where('idalunopacote', $id);
        return $this->db->update('tb_alunos_pacote',array(
            'situacao'=>$this->input->post('situacao_cancelar_pacote',true),
        ));
    }

    public function confirmar($id)
    {
        $this->db->where('idalunopacote', $id);
        return $this->db->update('tb_alunos_pacote',array(
            'situacao'=>$this->input->post('situacao_confirmar_pacote',true),
        ));
    }

    public function finalizar($id)
    {
        $this->db->where('idalunopacote', $id);
        return $this->db->update('tb_alunos_pacote',array(
            'situacao'=>$this->input->post('situacao_finalizar_pacote',true),
        ));
    }

    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'idalunopacote';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
        $offset = ($page-1) * $rows;

        $idalunopacote = isset($_POST['idalunopacote']) ? strval($_POST['idalunopacote']) : '';
        $nome_aluno_pacote = isset($_POST['nome_aluno_pacote']) ? strval($_POST['nome_aluno_pacote']) : '';

        $sit = array(0, 1);

        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->like('idalunopacote', $idalunopacote);
        $this->db->like('nome_aluno_pacote', $nome_aluno_pacote);
        $this->db->where_in('situacao', $sit);

        $criteria = $this->db->get('vw_alunos_pacote');

        $result = array();
        $result['total'] = $this->db->where_in('situacao', $sit)->get('vw_alunos_pacote')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'idalunopacote'=>$data['idalunopacote'],
                'fkidusuario'=>$data['fkidusuario'],
                'nome_aluno_pacote'=>$data['nome_aluno_pacote'],
                'creditohoras'=>$data['creditohoras'],
                'horasconsumidas'=>$data['horasconsumidas'],
                'situacao'=>$data['situacao'],
                'validade'=>$data['validade'],
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}