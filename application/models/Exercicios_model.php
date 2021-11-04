<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exercicios_model extends CI_Model {

    function __construct() 
    {
        parent::__construct();
    }

    public function get()
    {
        return $this->db->get('tb_exercicios')->result();
    }

    public function cadastrar($tipo)
    {
        if($tipo == true)
        {
            return $this->db->insert('tb_exercicios',array(
                'tipoquestao'=>$this->input->post('tipoquestao', true),
                'book'=>$this->input->post('book', true),
                'lesson'=>$this->input->post('lesson', true),
                'exercicio'=>$this->input->post('exercicio', true),
                'respostaa'=>$this->input->post('respostaa', true),
                'respostab'=>$this->input->post('respostab', true),
                'respostacorreta'=>$this->input->post('respostacorreta', true),
                'situacao'=>$this->input->post('situacao', true)
            ));
        }
        else
        {
            return $this->db->insert('tb_exercicios',array(
                'tipoquestao'=>$this->input->post('tipoquestao', true),
                'book'=>$this->input->post('book', true),
                'lesson'=>$this->input->post('lesson', true),
                'exercicio'=>$this->input->post('exercicio', true),
                'respostaa'=>$this->input->post('respostaa', true),
                'respostab'=>$this->input->post('respostab', true),
                'respostac'=>$this->input->post('respostac', true),
                'respostad'=>$this->input->post('respostad', true),
                'respostacorreta'=>$this->input->post('respostacorreta', true),
                'situacao'=>$this->input->post('situacao', true)
            ));
        }
    }

    public function atualizar($id)
    {
        $this->db->where('idexercicio', $id);
        return $this->db->update('tb_exercicios',array(
            'tipoquestao'=>$this->input->post('tipoquestao', true),
            'book'=>$this->input->post('book', true),
            'lesson'=>$this->input->post('lesson', true),
            'exercicio'=>$this->input->post('exercicio', true),
            'respostaa'=>$this->input->post('respostaa', true),
            'respostab'=>$this->input->post('respostab', true),
            'respostac'=>$this->input->post('respostac', true),
            'respostad'=>$this->input->post('respostad', true),
            'respostacorreta'=>$this->input->post('respostacorreta', true),
            'situacao'=>$this->input->post('situacao', true),
            'atualizado_em' => date('Y-m-d H:i:s')
        ));
    }

    public function cancelar($id)
    {
        $this->db->where('idexercicio', $id);
        return $this->db->update('tb_exercicios',array(
            'situacao'=>$this->input->post('situacao_cancelar_situacao',true),
        ));
    }

    public function desativar($id)
    {
        $this->db->where('idexercicio', $id);
        return $this->db->update('tb_exercicios',array(
            'situacao'=>$this->input->post('exercicio_ativar_desativar',true),
        ));
    }

    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'idexercicio';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
        $offset = ($page-1) * $rows;

        $idexercicio = isset($_POST['idexercicio']) ? strval($_POST['idexercicio']) : '';
        $book = isset($_POST['book']) ? strval($_POST['book']) : '';

        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->like('idexercicio', $idexercicio);
        $this->db->like('book', $book);

        $criteria = $this->db->get('tb_exercicios');

        $result = array();
        $result['total'] = $this->db->get('tb_exercicios')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'idexercicio'=>$data['idexercicio'],
                'tipoquestao'=>$data['tipoquestao'],
                'book'=>$data['book'],
                'lesson'=>$data['lesson'],
                'exercicio'=>$data['exercicio'],
                'respostaa'=>$data['respostaa'],
                'respostab'=>$data['respostab'],
                'respostac'=>$data['respostac'],
                'respostad'=>$data['respostad'],
                'respostacorreta'=>$data['respostacorreta'],
                'situacao'=>$data['situacao']
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}