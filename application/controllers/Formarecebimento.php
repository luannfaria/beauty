<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Formarecebimento extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Formarecebimento_model');
    } 

    /*
     * Listing of formarecebimentos
     */
    function index()
    {
        $data['formarecebimentos'] = $this->Formarecebimento_model->get_all_formarecebimentos();
        
        $data['_view'] = 'formarecebimento/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new formarecebimento
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nomeforma','Nomeforma','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nomeforma' => $this->input->post('nomeforma'),
            );
            
            $formarecebimento_id = $this->Formarecebimento_model->add_formarecebimento($params);
            redirect('formarecebimento/index');
        }
        else
        {            
            $data['_view'] = 'formarecebimento/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a formarecebimento
     */
    function edit($idformarecebimento)
    {   
        // check if the formarecebimento exists before trying to edit it
        $data['formarecebimento'] = $this->Formarecebimento_model->get_formarecebimento($idformarecebimento);
        
        if(isset($data['formarecebimento']['idformarecebimento']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nomeforma','Nomeforma','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nomeforma' => $this->input->post('nomeforma'),
                );

                $this->Formarecebimento_model->update_formarecebimento($idformarecebimento,$params);            
                redirect('formarecebimento/index');
            }
            else
            {
                $data['_view'] = 'formarecebimento/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The formarecebimento you are trying to edit does not exist.');
    } 

    /*
     * Deleting formarecebimento
     */
    function remove($idformarecebimento)
    {
        $formarecebimento = $this->Formarecebimento_model->get_formarecebimento($idformarecebimento);

        // check if the formarecebimento exists before trying to delete it
        if(isset($formarecebimento['idformarecebimento']))
        {
            $this->Formarecebimento_model->delete_formarecebimento($idformarecebimento);
            redirect('formarecebimento/index');
        }
        else
            show_error('The formarecebimento you are trying to delete does not exist.');
    }
    
}
