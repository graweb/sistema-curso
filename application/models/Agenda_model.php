<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda_model extends CI_Model {

    function __construct() 
    {
        parent::__construct();
    }

    public function get()
    {
        return $this->db->get('tb_agenda')->result();
    }

    public function cadastrar()
    {
        $dia_agenda = strtr($this->input->post('dia'), '/', '-');
        $horafim = date('H', strtotime('+1 hour', strtotime($this->input->post('horainicio'))));

        return $this->db->insert('tb_agenda',array(
            'fkidusuario'=>$this->input->post('fkidusuario', true),
            'professor'=>$this->input->post('professor', true),
            'dia'=>date('Y-m-d', strtotime($dia_agenda)),
            'horainicio'=>$this->input->post('horainicio', true),
            'horafim'=>$horafim,
        ));
    }

    public function atualizar($id)
    {
        $dia_agenda = strtr($this->input->post('dia'), '/', '-');
        $horafim = date('H', strtotime('+1 hour', strtotime($this->input->post('horainicio'))));

        // PEGA O DIA AGENDADO
        /*$this->db->where('idagenda', $id);
        $diaatual = $this->db->get('tb_agenda')->row();

        $this->db->where('nome', $this->input->post('professor'));
        $prof = $this->db->get('tb_usuarios')->row();

        // ENVIA UM E-MAIL PARA O PROFESSOR
        $this->load->library('email');
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        $this->email->from($this->input->post('email_aluno'), $this->input->post('nome_aluno_email'));
        $this->email->to($prof->email);
        $this->email->subject('Atualização de Agendamento');
        $this->email->message('Olá professor '.$this->input->post('professor').' o aluno '.$this->input->post('nome_aluno_email').' alterou a aula do dia '.$diaatual->dia.' para o dia '.$this->input->post('dia').' de '.$this->input->post('horainicio').' até '.$horafim);
        
        $this->email->send();*/

        $this->db->where('idagenda', $id);
        return $this->db->update('tb_agenda',array(
            'fkidusuario'=>$this->input->post('fkidusuario', true),
            'professor'=>$this->input->post('professor', true),
            'dia'=>date('Y-m-d', strtotime($dia_agenda)),
            'horainicio'=>$this->input->post('horainicio', true),
            'horafim'=>$horafim,
            'situacao'=>1,
            'atualizado_em' => date('Y-m-d H:i:s'),
        ));
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

    public function confirmar($id)
    {
        // PEGA O SALDO DO ALUNO
        $this->db->where('fkidusuario', $this->input->post('fkidusuario_confirmar_agenda'));
        $this->db->where('situacao', 1);
        $saldo = $this->db->get('tb_alunos_pacote')->row();

        if(is_null($saldo) || $saldo->creditohoras == 0)
        {
            return false;
        }
        else
        {
            $this->db->where('idagenda', $id);
            return $this->db->update('tb_agenda',array(
                'situacao'=>$this->input->post('situacao_confirmar_agenda',true),
            ));
        }
    }

    public function finalizar($idagenda)
    {
        // RECEBE OS VALORES
        $id = $this->input->post('fkidusuariofinalizar');
        $hi = (int)$this->input->post('horainiciofinalizar');
        $hf = (int)$this->input->post('horafimfinalizar');
        $tothora = $hf - $hi;

        // PEGA O SALDO DO PACOTE ATIVO DO USUÁRIO
        $this->db->where('fkidusuario', $id);
        $this->db->where('situacao', 1);
        $saldo = $this->db->get('tb_alunos_pacote')->row();

        if(is_null($saldo))
        {
            return false;
        }
        else
        {
            // CALCULA O SALDO
            $totsaldo = $saldo->creditohoras - $tothora;

            // ATUALIZA O SALDO DE HORAS E O SALDO RESTANTE DO PACOTE 
            $this->db->where('fkidusuario', $id);
            $this->db->where('situacao', 1);
            $this->db->update('tb_alunos_pacote',array(
                'creditohoras'=>$totsaldo,
                'horasconsumidas'=>$tothora + $saldo->horasconsumidas
            ));

            // FINALIZA O AGENDAMENTO
            $this->db->where('idagenda', $idagenda);
            return $this->db->update('tb_agenda',array(
                'materia'=>$this->input->post('materia',true),
                'fala'=>$this->input->post('fala',true),
                'audicao'=>$this->input->post('audicao',true),
                'leitura'=>$this->input->post('leitura',true),
                'escrita'=>$this->input->post('escrita',true),
                'situacao'=>2,
            ));
        }
    }

    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'dia';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
        $offset = ($page-1) * $rows;

        $idagenda = isset($_POST['idagenda']) ? strval($_POST['idagenda']) : '';
        $nome_aluno = isset($_POST['nome_aluno']) ? strval($_POST['nome_aluno']) : '';
        $professor = isset($_POST['professor']) ? strval($_POST['professor']) : '';

        $sit = array(2, 3);

        $this->db->limit($rows, $offset);
        //$this->db->order_by($sort, $order);
        $this->db->like('idagenda', $idagenda);
        $this->db->like('nome_aluno', $nome_aluno);
        $this->db->like('professor', $professor);
        $this->db->where_not_in('situacao', $sit);

        $criteria = $this->db->get('vw_agenda');

        $result = array();
        $result['total'] = $this->db->where_not_in('situacao', $sit)->get('vw_agenda')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'idagenda'=>$data['idagenda'],
                'fkidusuario'=>$data['fkidusuario'],
                'nome_aluno'=>$data['nome_aluno'],
                'email'=>$data['email'],
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