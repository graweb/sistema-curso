<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bloqueioaulas_model extends CI_Model {

    function __construct() 
    {
        parent::__construct();
    }

    public function get()
    {
        return $this->db->where('situacao', 4)->get('tb_agenda')->result();
    }

    public function cadastrar()
    {
        $dia_agenda = strtr($this->input->post('dia'), '/', '-');
        $horafim = date('H', strtotime('+1 hour', strtotime($this->input->post('horainicio'))));

        // VERIFICA SE O DIA/HORÁRIO JÁ POSSUI UM BLOQUEIO
        $this->db->where('professor', $this->input->post('professor'));
        $this->db->where('dia', date('Y-m-d', strtotime($dia_agenda)));
        $this->db->where('horainicio', $this->input->post('horainicio'));
        $livre = $this->db->get('tb_agenda')->row();

        if(isset($livre))
        {
            return false;
        }
        else
        {
            if($this->input->post('odiatodo') == true)
            {
                $hori = 6;
                $horf = 7;

                while ($hori <= 23):
                    
                    if($hori == 23)
                    {
                        $horf = 0;
                    }

                    $this->db->insert('tb_agenda',array(
                        'professor'=>$this->input->post('professor', true),
                        'dia'=>date('Y-m-d', strtotime($dia_agenda)),
                        'situacao'=>4,
                        'horainicio'=>$hori,
                        'horafim'=>$horf,
                    ));
                    $hori++;
                    $horf++;
                endwhile;

                return true;
            }
            else
            {
                return $this->db->insert('tb_agenda',array(
                    'professor'=>$this->input->post('professor', true),
                    'dia'=>date('Y-m-d', strtotime($dia_agenda)),
                    'situacao'=>4,
                    'horainicio'=>$this->input->post('horainicio', true),
                    'horafim'=>$horafim,
                ));
            }
        }
    }

    public function cancelar($id)
    {
        // PEGA O SALDO DO ALUNO PARA SOMAR 1HR
        $this->db->where('fkidusuario', $this->input->post('fkidaluno_cancelar_agenda'));
        $this->db->where('situacao', 1);
        $saldo = $this->db->get('tb_alunos_pacote')->row();

        $diaaula = date("d/m/Y", strtotime(date('Y-m-d')));

        if($this->input->post('data_cancelar_agenda') == $diaaula)
        {
            $this->db->where('fkidusuario', $this->input->post('fkidaluno_cancelar_agenda'));
            $this->db->update('tb_alunos_pacote',array(
                'creditohoras'=>$saldo->creditohoras+1,
            ));

            $this->db->where('idagenda', $id);
            return $this->db->update('tb_agenda',array(
                'situacao'=>$this->input->post('situacao_cancelar_agenda',true),
            ));
        }
        else
        {
            $this->db->where('idagenda', $id);
            return $this->db->update('tb_agenda',array(
                'situacao'=>$this->input->post('situacao_cancelar_agenda',true),
            ));
        }
    }

    public function excluir($id)
    {
        $this->db->where('idagenda', $id);
        $this->db->delete('tb_agenda');

        return true;
    }

    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'idagenda';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
        $offset = ($page-1) * $rows;

        $professor = isset($_POST['professor']) ? strval($_POST['professor']) : '';

        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->like('professor', $professor);

        $criteria = $this->db->get('vw_bloqueio_aulas');

        $result = array();
        $result['total'] = $this->db->get('vw_bloqueio_aulas')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'idagenda'=>$data['idagenda'],
                'professor'=>$data['professor'],
                'dia'=>$data['dia'],
                'horainicio'=>$data['horainicio'],
                'horafim'=>$data['horafim'],
                'situacao'=>$data['situacao']
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}