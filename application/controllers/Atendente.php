<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Atendente extends CI_Controller{
    function __construct()
    {
        parent::__construct();

        if( (!session_id()) || (!$this->session->userdata('logado'))){
            redirect('dashboard/index');
}
        $this->load->model('Atendente_model');
    }

    /*
     * Listing of atendentes
     */
    function index()
    {
        $data['atendentes'] = $this->Atendente_model->get_all_atendentes();

      //  $data['_view'] = 'atendente/index';
      //  $this->load->view('layouts/main',$data);
      $this->load->view('include/header');
      $this->load->view('atendente/index',$data);
      $this->load->view('include/footer');
    }

    /*
     * Adding a new atendente
     */
    function add()
    {
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nome','Nome','required');
		$this->form_validation->set_rules('sobrenome','Sobrenome','required');
		$this->form_validation->set_rules('telefonecelular','Telefonecelular','required');

		if($this->form_validation->run())
        {
            $params = array(
				'nome' => $this->input->post('nome'),
				'sobrenome' => $this->input->post('sobrenome'),
				'dataadmissao' => $this->input->post('dataadmissao'),
				'comissao' => $this->input->post('comissao'),
				'status' => $this->input->post('status'),
				'idsetor' => $this->input->post('idsetor'),
				'datanascimento' => $this->input->post('datanascimento'),
				'telefonecelular' => $this->input->post('telefonecelular'),
				'telefonefixo' => $this->input->post('telefonefixo'),
				'rua' => $this->input->post('rua'),
				'numero' => $this->input->post('numero'),
				'bairro' => $this->input->post('bairro'),
				'cidade' => $this->input->post('cidade'),
				'cpf' => $this->input->post('cpf'),
            );

            $atendente_id = $this->Atendente_model->add_atendente($params);
            redirect('atendente/index');
        }
        else
        {
          $this->load->view('include/header');
          $this->load->view('atendente/add');
          $this->load->view('include/footer');
        }
    }

    /*
     * Editing a atendente
     */
    function edit($idatendente)
    {
        // check if the atendente exists before trying to edit it
        $data['atendente'] = $this->Atendente_model->get_atendente($idatendente);

        if(isset($data['atendente']['idatendente']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nome','Nome','required');
			$this->form_validation->set_rules('sobrenome','Sobrenome','required');
			$this->form_validation->set_rules('telefonecelular','Telefonecelular','required');

			if($this->form_validation->run())
            {
                $params = array(
					'nome' => $this->input->post('nome'),
					'sobrenome' => $this->input->post('sobrenome'),
					'dataadmissao' => $this->input->post('dataadmissao'),
					'comissao' => $this->input->post('comissao'),
					'status' => $this->input->post('status'),
					'idsetor' => $this->input->post('idsetor'),
					'datanascimento' => $this->input->post('datanascimento'),
					'telefonecelular' => $this->input->post('telefonecelular'),
					'telefonefixo' => $this->input->post('telefonefixo'),
					'rua' => $this->input->post('rua'),
					'numero' => $this->input->post('numero'),
					'bairro' => $this->input->post('bairro'),
					'cidade' => $this->input->post('cidade'),
					'cpf' => $this->input->post('cpf'),
                );

                $this->Atendente_model->update_atendente($idatendente,$params);
                redirect('atendente/index');
            }
            else
            {
              $this->load->view('include/header');
              $this->load->view('atendente/edit',$data);
              $this->load->view('include/footer');
            }
        }
        else
            show_error('The atendente you are trying to edit does not exist.');
    }

    /*
     * Deleting atendente
     */
    function remove($idatendente)
    {
        $atendente = $this->Atendente_model->get_atendente($idatendente);

        // check if the atendente exists before trying to delete it
        if(isset($atendente['idatendente']))
        {
            $this->Atendente_model->delete_atendente($idatendente);
            redirect('atendente/index');
        }
        else
            show_error('The atendente you are trying to delete does not exist.');
    }

}
