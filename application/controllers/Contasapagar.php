<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Contasapagar extends CI_Controller{
    function __construct()
    {
        parent::__construct();

        if( (!session_id()) || (!$this->session->userdata('logado'))){
            redirect('dashboard/index');
}


        $this->load->model('Contasapagar_model');
    }

    /*
     * Listing of contasapagars
     */
    function index()
    {
      $this->load->library('table');
  $this->load->library('pagination');

      $config['base_url'] = base_url() . 'contasapagar/index';
      $config['total_rows'] = $this->Contasapagar_model->count_all();
      $config['per_page'] = 10;
      $config['next_link'] = '>>';
      $config['prev_link'] = '<<';
      $config['full_tag_open'] = '<div class="text-center"><ul class="pagination">';
      $config['full_tag_close'] = '</ul></div>';
      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
      $config['cur_tag_close'] = '</b></a></li>';
      $config['prev_tag_open'] = '<li>';
      $config['prev_tag_close'] = '</li>';
      $config['next_tag_open'] = '<li>';
      $config['next_tag_close'] = '</li>';
      $config['first_link'] = 'Primeira';
      $config['last_link'] = 'Última';
      $config['first_tag_open'] = '<li>';
      $config['first_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li>';
      $config['last_tag_close'] = '</li>';

      $this->pagination->initialize($config);
//$data["results"] = $this->Calendar_model->get_current_page_records($config['per_page'],$this->uri->segment(3));
      // build paging links
      $data["links"] = $this->pagination->create_links();

      $this->load->model('Atendente_model');
          $data['all_atendentes'] = $this->Atendente_model->get_all_atendentes();
        $data['contasapagars'] = $this->Contasapagar_model->get_all_contasapagars($config['per_page'],$this->uri->segment(3));

        //$data['_view'] = 'contasapagar/index';
      //  $this->load->view('layouts/main',$data);

      $this->load->view('include/header');
      $this->load->view('contasapagar/index',$data);
      $this->load->view('include/footer');
    }

    /*
     * Adding a new contasapagar
     */


     function saidacaixa(){

       $tipomovi = 2;
               $fluxo = array(

                   'forma' => $this->input->post('formarecebimento'),
                 'data' => $this->input->post('datavencimento'),
                 'valor' => $this->input->post('valor'),
                   'descricao' => $this->input->post('descricao'),
                 'tipomov' =>$tipomovi,
               );

               $this->load->model('Fluxo_model');

                 if($this->Fluxo_model->addsaida($fluxo) == true){
               		echo json_encode(array('result' => true));
               	}

               	else{
               		echo json_encode(array('result' =>false));
               	}

     }
    function add()
    {
        $this->load->library('form_validation');

		$this->form_validation->set_rules('descricao','Descricao','required');
		$this->form_validation->set_rules('valor','Valor','required');
		$this->form_validation->set_rules('datavencimento','Datavencimento','required');


    if($this->input->post('datapagamento')!=NULL){




$tipomovi = 2;
        $fluxo = array(

            'forma' => $this->input->post('formarecebimento'),
          'data' => $this->input->post('datapagamento'),
          'valor' => $this->input->post('valor'),
            'descricao' => $this->input->post('descricao'),
          'tipomov' =>$tipomovi,
        );

        $this->load->model('Fluxo_model');

          $d =  $this->Fluxo_model->add($fluxo);
    }

		if($this->form_validation->run())
        {
            $params = array(
				'formarecebimento' => $this->input->post('formarecebimento'),
				'descricao' => $this->input->post('descricao'),
				'numero' => $this->input->post('numero'),
				'valor' => $this->input->post('valor'),
				'datavencimento' => $this->input->post('datavencimento'),
				'datapagamento' => $this->input->post('datapagamento'),
				'obs' => $this->input->post('obs'),
            );

            $contasapagar_id = $this->Contasapagar_model->add_contasapagar($params);
            redirect('contasapagar/index');
        }
        else
        {
			$this->load->model('Formarecebimento_model');
			$data['all_formarecebimentos'] = $this->Formarecebimento_model->get_all_formarecebimentos();

          //  $data['_view'] = 'contasapagar/add';
        //    $this->load->view('layouts/main',$data);

        $this->load->view('include/header');
        $this->load->view('contasapagar/add',$data);
        $this->load->view('include/footer');
        }
    }

    /*
     * Editing a contasapagar
     */
    function edit($idcontasapagar)
    {
        // check if the contasapagar exists before trying to edit it
        $data['contasapagar'] = $this->Contasapagar_model->get_contasapagar($idcontasapagar);

        if(isset($data['contasapagar']['idcontasapagar']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('descricao','Descricao','required');
			$this->form_validation->set_rules('valor','Valor','required');
			$this->form_validation->set_rules('datavencimento','Datavencimento','required');

      if($this->input->post('datapagamento')!=NULL){




  $tipomovi = 2;
          $fluxo = array(

              'forma' => $this->input->post('formarecebimento'),
            'data' => $this->input->post('datapagamento'),
            'valor' => $this->input->post('valor'),
              'descricao' => $this->input->post('descricao'),
            'tipomov' =>$tipomovi,
          );

          $this->load->model('Fluxo_model');

            $d =  $this->Fluxo_model->add($fluxo);
      }

			if($this->form_validation->run())
            {
                $params = array(
					'formarecebimento' => $this->input->post('formarecebimento'),
					'descricao' => $this->input->post('descricao'),
					'numero' => $this->input->post('numero'),
					'valor' => $this->input->post('valor'),
					'datavencimento' => $this->input->post('datavencimento'),
					'datapagamento' => $this->input->post('datapagamento'),
					'obs' => $this->input->post('obs'),
                );

                $this->Contasapagar_model->update_contasapagar($idcontasapagar,$params);
                redirect('contasapagar/index');
            }
            else
            {
				$this->load->model('Formarecebimento_model');
				$data['all_formarecebimentos'] = $this->Formarecebimento_model->get_all_formarecebimentos();

            //    $data['_view'] = 'contasapagar/edit';
              //  $this->load->view('layouts/main',$data);

              $this->load->view('include/header');
              $this->load->view('contasapagar/edit',$data);
              $this->load->view('include/footer');
            }
        }
        else
            show_error('The contasapagar you are trying to edit does not exist.');
    }

    /*
     * Deleting contasapagar
     */
    function remove($idcontasapagar)
    {
        $contasapagar = $this->Contasapagar_model->get_contasapagar($idcontasapagar);

        // check if the contasapagar exists before trying to delete it
        if(isset($contasapagar['idcontasapagar']))
        {
            $this->Contasapagar_model->delete_contasapagar($idcontasapagar);
            redirect('contasapagar/index');
        }
        else
            show_error('The contasapagar you are trying to delete does not exist.');
    }

}
