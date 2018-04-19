<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Cliente extends CI_Controller{
    function __construct()
    {
        parent::__construct();

        if( (!session_id()) || (!$this->session->userdata('logado'))){
            redirect('dashboard/index');
}


        $this->load->helper(array('codegen_helper'));
          $this->load->model('Cliente_model','',TRUE);
          $this->data['menuCliente'] = 'cliente';
    }

    /*
     * Listing of clientes
     */
    function index()
    {

      $this->gerenciar();

    }


    function gerenciar(){

      if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar clientes.');
           redirect(base_url());
        }


        $this->load->library('table');
        $this->load->library('pagination');


        $config['base_url'] = base_url().'cliente/gerenciar/';
        $config['total_rows'] = $this->Cliente_model->count('cliente');
        $config['per_page'] = 10;
       $config['uri_segment'] = 3;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['full_tag_open'] = '<div class="panel-body""><ul class="pagination pagination-lg">';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = '>>';
        $config['last_link'] = '<<';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['custom_error'] = '';


        $data['clientes'] = $this->Cliente_model->get_all_clientes();

    //    $data['_view'] = 'cliente/index';
      //  $this->load->view('layouts/main',$data);

      $this->load->view('include/header');
      $this->load->view('cliente/index',$data);
      $this->load->view('include/footer');





    }

    /*
     * Adding a new cliente
     */
    function add()
    {

      if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aCliente')){
         $this->session->set_flashdata('error','Você não tem permissão para adicionar clientes.');
         redirect(base_url());
      }
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nome','Nome','required');
		$this->form_validation->set_rules('sobrenome','Sobrenome','required');
		$this->form_validation->set_rules('telefonecelular','Telefonecelular','required');

		if($this->form_validation->run())
        {
            $params = array(
				'status' => $this->input->post('status'),
				'nome' => $this->input->post('nome'),
				'sobrenome' => $this->input->post('sobrenome'),
				'datacadastro' => $this->input->post('datacadastro'),
				'telefonefixo' => $this->input->post('telefonefixo'),
				'telefonecelular' => $this->input->post('telefonecelular'),
				'rua' => $this->input->post('rua'),
				'numero' => $this->input->post('numero'),
				'bairro' => $this->input->post('bairro'),
				'cidade' => $this->input->post('cidade'),
				'obs' => $this->input->post('obs'),
            );

             if($this->Cliente_model->add_cliente($params) == TRUE){
               $this->session->set_flashdata('success','Cliente adicionado com sucesso!');
                 redirect('cliente/gerenciar');
             }
             else {
                 $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
             }

        }
        else
        {


          //  $data['_view'] = 'cliente/add';
          //  $this->load->view('layouts/main',$data);


        }
        $this->load->view('include/header');
        $this->load->view('cliente/add',$this->data);
        $this->load->view('include/footer');
    }

    /*
     * Editing a cliente
     */
    function edit($idcliente)
    {
        // check if the cliente exists before trying to edit it
        $data['cliente'] = $this->Cliente_model->get_cliente($idcliente);

        if(isset($data['cliente']['idcliente']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nome','Nome','required');
			$this->form_validation->set_rules('sobrenome','Sobrenome','required');
			$this->form_validation->set_rules('telefonecelular','Telefonecelular','required');

			if($this->form_validation->run())
            {
                $params = array(
					'status' => $this->input->post('status'),
					'nome' => $this->input->post('nome'),
					'sobrenome' => $this->input->post('sobrenome'),
					'datacadastro' => $this->input->post('datacadastro'),
					'telefonefixo' => $this->input->post('telefonefixo'),
					'telefonecelular' => $this->input->post('telefonecelular'),
					'rua' => $this->input->post('rua'),
					'numero' => $this->input->post('numero'),
					'bairro' => $this->input->post('bairro'),
					'cidade' => $this->input->post('cidade'),
					'obs' => $this->input->post('obs'),
                );

                $this->Cliente_model->update_cliente($idcliente,$params);
                redirect('cliente/index');
            }
            else
            {
              //  $data['_view'] = 'cliente/edit';
            //    $this->load->view('layouts/main',$data);

            $this->load->view('include/header');
            $this->load->view('cliente/edit',$data);
            $this->load->view('include/footer');
            }
        }
        else
            show_error('The cliente you are trying to edit does not exist.');
    }

    /*
     * Deleting cliente
     */
    function remove($idcliente)
    {
        $cliente = $this->Cliente_model->get_cliente($idcliente);

        // check if the cliente exists before trying to delete it
        if(isset($cliente['idcliente']))
        {
            $this->Cliente_model->delete_cliente($idcliente);
            redirect('cliente/index');
        }
        else
            show_error('The cliente you are trying to delete does not exist.');
    }

}
