<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Agenda extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        if( (!session_id()) || (!$this->session->userdata('logado'))){
            redirect('dashboard/index');
}
        $this->load->model('Agenda_model');
    }

    /*
     * Listing of agendas
     */
    function index()
    {
        $data['agendas'] = $this->Agenda_model->get_all_agendas();

    //    $data['_view'] = 'agenda/index';
      //  $this->load->view('layouts/main',$data);

      $this->load->view('include/header');
      $this->load->view('agenda/index');
      $this->load->view('include/footer');

    }

    public function listausuarios(){


               $event = $this->Agenda_model->listausuariosagenda();
              $obj =NULL;
               foreach ($event as $i) {
          $obj[] = [
              'id' => $i['idatendente'],
              'title' => $i['nome']



          ];


          }
               echo json_encode($obj);
         exit();
          }

    /*
     * Adding a new agenda
     */
    function add()
    {
        $this->load->library('form_validation');

		$this->form_validation->set_rules('idatendente','Idatendente','required');
		$this->form_validation->set_rules('dataagenda','Dataagenda','required');
		$this->form_validation->set_rules('horaagenda','Horaagenda','required');
		$this->form_validation->set_rules('idcliente','Idcliente','required');

		if($this->form_validation->run())
        {
            $params = array(
				'idatendente' => $this->input->post('atendente'),
				'idcliente' => $this->input->post('idcliente'),
				'status' => $this->input->post('status'),
				'dataagenda' => $this->input->post('dataagenda'),
				'horaagenda' => $this->input->post('horaagenda'),
            );

            $agenda_id = $this->Agenda_model->add_agenda($params);
            redirect('agenda/index');
        }
        else
        {
			$this->load->model('Atendente_model');
			$data['all_atendentes'] = $this->Atendente_model->get_all_atendentes();

			$this->load->model('Cliente_model');
			$data['all_clientes'] = $this->Cliente_model->get_all_clientes();

            $data['_view'] = 'agenda/add';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Editing a agenda
     */
    function edit($idagenda)
    {
        // check if the agenda exists before trying to edit it
        $data['agenda'] = $this->Agenda_model->get_agenda($idagenda);

        if(isset($data['agenda']['idagenda']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('idatendente','Idatendente','required');
			$this->form_validation->set_rules('dataagenda','Dataagenda','required');
			$this->form_validation->set_rules('horaagenda','Horaagenda','required');
			$this->form_validation->set_rules('idcliente','Idcliente','required');

			if($this->form_validation->run())
            {
                $params = array(
					'idatendente' => $this->input->post('idatendente'),
					'idcliente' => $this->input->post('idcliente'),
					'status' => $this->input->post('status'),
					'dataagenda' => $this->input->post('dataagenda'),
					'horaagenda' => $this->input->post('horaagenda'),
                );

                $this->Agenda_model->update_agenda($idagenda,$params);
                redirect('agenda/index');
            }
            else
            {
				$this->load->model('Atendente_model');
				$data['all_atendentes'] = $this->Atendente_model->get_all_atendentes();

				$this->load->model('Cliente_model');
				$data['all_clientes'] = $this->Cliente_model->get_all_clientes();

                $data['_view'] = 'agenda/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The agenda you are trying to edit does not exist.');
    }

    /*
     * Deleting agenda
     */
    function remove($idagenda)
    {
        $agenda = $this->Agenda_model->get_agenda($idagenda);

        // check if the agenda exists before trying to delete it
        if(isset($agenda['idagenda']))
        {
            $this->Agenda_model->delete_agenda($idagenda);
            redirect('agenda/index');
        }
        else
            show_error('The agenda you are trying to delete does not exist.');
    }

}
