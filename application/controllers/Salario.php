<?php


class Salario extends CI_Controller {

		function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				if( (!session_id()) || (!$this->session->userdata('logado'))){
						redirect('dashboard/index');
}
        $this->load->model('Salario_model');

    }


	/*Home page Calendar view  */
	Public function index()
	{


    $this->load->model('Atendente_model');
        $data['all_atendentes'] = $this->Atendente_model->get_all_atendentes();
  }

	public function pgtofunc(){

		$func  = array(
				'idfunc'  => $this->input->post('atendente'),
				'valor' => $this->input->post('valor'),
				'data' => $this->input->post('datapagamento'),
				'descricao' => $this->input->post('descricao'),
				'tipopgto' => $this->input->post('salario_comissao'),
				'formapgto'  => $this->input->post('formarecebimento'),
		);

		if($this->Salario_model->pgtofunc($func) ==true){

$this->load->model('Fluxo_model');
$tipomov= '2';
$fluxo = array(

		'valor' => $this->input->post('valor'),
		'data' => $this->input->post('datapagamento'),
		'descricao' => $this->input->post('descricao'),
		'tipomov' => $tipomov,
		'forma'  => $this->input->post('formarecebimento'),
);

$t = $this->Fluxo_model->addsaida($fluxo);

			echo json_encode(array('result' => true));
		}

		else{
			echo json_encode(array('result' =>false));
		}

	}

}
