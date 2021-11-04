<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permissoes_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function get(){
        return $this->db->get('tb_permissoes')->result();
    }

    public function pegarPorID($id){
        $this->db->where('idpermissao',$id);
        return $this->db->get('tb_permissoes')->row();
    }

    public function cadastrar()
    {
        return $this->db->insert('tb_permissoes',array(
            'nome'=>$this->input->post('nome',true),
            'situacao'=>$this->input->post('situacao',true)
        ));
    }

    public function salvarAcessos()
    {
        $permissoes = array(
            'vAgenda' => $this->input->post('vAgenda'),
            'aAgenda' => $this->input->post('aAgenda'),
            'eAgenda' => $this->input->post('eAgenda'),
            'dAgenda' => $this->input->post('dAgenda'),

            'vAlunos' => $this->input->post('vAlunos'),
            'aAlunos' => $this->input->post('aAlunos'),
            'eAlunos' => $this->input->post('eAlunos'),
            'dAlunos' => $this->input->post('dAlunos'),

            'vBloqueioAula' => $this->input->post('vBloqueioAula'),
            'aBloqueioAula' => $this->input->post('aBloqueioAula'),
            'eBloqueioAula' => $this->input->post('eBloqueioAula'),
            'dBloqueioAula' => $this->input->post('dBloqueioAula'),

            'vExercicios' => $this->input->post('vExercicios'),
            'aExercicios' => $this->input->post('aExercicios'),
            'eExercicios' => $this->input->post('eExercicios'),
            'dExercicios' => $this->input->post('dExercicios'),

            'vPacotes' => $this->input->post('vPacotes'),
            'aPacotes' => $this->input->post('aPacotes'),
            'ePacotes' => $this->input->post('ePacotes'),
            'dPacotes' => $this->input->post('dPacotes'),

            'vNotificacoes' => $this->input->post('vNotificacoes'),
            'aNotificacoes' => $this->input->post('aNotificacoes'),
            'eNotificacoes' => $this->input->post('eNotificacoes'),
            'dNotificacoes' => $this->input->post('dNotificacoes'),

            'vRelatorios' => $this->input->post('vRelatorios'),

            'vConfigUsuarios' => $this->input->post('vConfigUsuarios'),
            'aConfigUsuarios' => $this->input->post('aConfigUsuarios'),
            'eConfigUsuarios' => $this->input->post('eConfigUsuarios'),
            'dConfigUsuarios' => $this->input->post('dConfigUsuarios'),

            'vConfigPermissoes' => $this->input->post('vConfigPermissoes'),
            'aConfigPermissoes' => $this->input->post('aConfigPermissoes'),
            'eConfigPermissoes' => $this->input->post('eConfigPermissoes'),
            'dConfigPermissoes' => $this->input->post('dConfigPermissoes'),
        );

        $permissoes = serialize($permissoes);

        $this->db->where('idpermissao', $this->input->post('idpermissao',true));
        return $this->db->update('tb_permissoes',array(
            'permissoes'=>$permissoes,
        ));
    }

    public function atualizar($id)
    {
        $this->db->where('idpermissao', $id);
        return $this->db->update('tb_permissoes',array(
            'nome'=>$this->input->post('nome',true),
            'permissoes'=>$this->input->post('permissoes',true),
            'situacao'=>$this->input->post('situacao',true),
            'atualizado_em' => date('Y-m-d H:i:s')
        ));
    }

    public function desativar($id)
    {
        $this->db->where('idpermissao', $id);
        return $this->db->update('tb_permissoes',array(
            'situacao'=>$this->input->post('permissao_ativar_desativar',true)
        ));
    }
    
    public function deletar($id)
    {
        return $this->db->delete('tb_permissoes', array('idpermissao' => $id)); 
    }

    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'idpermissao';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;

        $idpermissao = isset($_POST['idpermissao']) ? strval($_POST['idpermissao']) : '';
        $nome = isset($_POST['nome']) ? strval($_POST['nome']) : '';
        
        $this->db->select('*');
        $this->db->from('tb_permissoes');
        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->like('idpermissao', $idpermissao);
        $this->db->like('nome', $nome);

        $criteria = $this->db->get();

        $result = array();
        $result['total'] = $this->db->get('tb_permissoes')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {
            $row[] = array(
                'idpermissao'=>$data['idpermissao'],
                'nome'=>$data['nome'],
                'permissoes'=>$data['permissoes'],
                'situacao'=>$data['situacao']
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}