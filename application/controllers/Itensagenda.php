<?php
/*
 * Myflow Sistemas
 *
 */

class Itensagenda extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Itensagenda_model');
    }

    /*
     * Listing of itensagenda
     */
    function index()
    {
        $data['itensagenda'] = $this->Itensagenda_model->get_all_itensagenda();

        $data['_view'] = 'itensagenda/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new itensagenda
     */
    function add()
    {
        if(isset($_POST) && count($_POST) > 0)
        {
            $params = array(
				'idagenda' => $this->input->post('idagenda'),
				'idservico' => $this->input->post('idservico'),
				'idatendente' => $this->input->post('idatendente'),
				'start' => $this->input->post('start'),
				'temposervico' => $this->input->post('temposervico'),
				'nomeservico' => $this->input->post('nomeservico'),
				'valorservico' => $this->input->post('valorservico'),
				'comissao' => $this->input->post('comissao'),
				'executado' => $this->input->post('executado'),
				'status' => $this->input->post('status'),
            );

            $itensagenda_id = $this->Itensagenda_model->add_itensagenda($params);
            redirect('itensagenda/index');
        }
        else
        {
			$this->load->model('Agenda_model');
			$data['all_agenda'] = $this->Agenda_model->get_all_agenda();

			$this->load->model('Servico_model');
			$data['all_servicos'] = $this->Servico_model->get_all_servicos();

			$this->load->model('Atendente_model');
			$data['all_atendentes'] = $this->Atendente_model->get_all_atendentes();

            $data['_view'] = 'itensagenda/add';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Editing a itensagenda
     */

     function faturar($iditensagenda){
       $this->load->model('Agenda_model');
          $data['itensagenda'] = $this->Agenda_model->get_agenda($iditensagenda);

$this->load->view('include/header');
$this->load->view('agenda/fatura',$data);
$this->load->view('include/footer');


     }
    function edit($iditensagenda)
    {
        // check if the itensagenda exists before trying to edit it
        $data['itensagenda'] = $this->Itensagenda_model->get_itensagenda($iditensagenda);

        if(isset($data['itensagenda']['iditensagenda']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
					'idagenda' => $this->input->post('idagenda'),
					'idservico' => $this->input->post('idservico'),
					'idatendente' => $this->input->post('idatendente'),
					'start' => $this->input->post('start'),
					'temposervico' => $this->input->post('temposervico'),
					'nomeservico' => $this->input->post('nomeservico'),
					'valorservico' => $this->input->post('valorservico'),
					'comissao' => $this->input->post('comissao'),
					'executado' => $this->input->post('executado'),
					'status' => $this->input->post('status'),
                );

                $this->Itensagenda_model->update_itensagenda($iditensagenda,$params);
                redirect('itensagenda/index');
            }
            else
            {
				$this->load->model('Agenda_model');
				$data['all_agenda'] = $this->Agenda_model->get_all_agenda();

				$this->load->model('Servico_model');
				$data['all_servicos'] = $this->Servico_model->get_all_servicos();

				$this->load->model('Atendente_model');
				$data['all_atendentes'] = $this->Atendente_model->get_all_atendentes();

                $data['_view'] = 'itensagenda/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The itensagenda you are trying to edit does not exist.');
    }

    /*
     * Deleting itensagenda
     */
    function remove($iditensagenda)
    {
        $itensagenda = $this->Itensagenda_model->get_itensagenda($iditensagenda);

        // check if the itensagenda exists before trying to delete it
        if(isset($itensagenda['iditensagenda']))
        {
            $this->Itensagenda_model->delete_itensagenda($iditensagenda);
            redirect('itensagenda/index');
        }
        else
            show_error('The itensagenda you are trying to delete does not exist.');
    }

}
