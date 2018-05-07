<?php


class Calendar extends CI_Controller {

		function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				if( (!session_id()) || (!$this->session->userdata('logado'))){
						redirect('dashboard/index');
}
        $this->load->model('Calendar_model');

    }


	/*Home page Calendar view  */
	Public function index()
	{

		$this->load->model('Cliente_model');
		$data['all_clientes'] = $this->Cliente_model->get_all_clientes();

$this->load->model('Atendente_model');
		$data['all_atendentes'] = $this->Atendente_model->get_all_atendentes();

		$this->load->model('Servico_model');
		$data['all_servicos'] = $this->Servico_model->get_all_servicos();
		$this->load->view('include/header');
		$this->load->view('agenda/agenda',$data);
		$this->load->view('include/footer');
	}

	function agendavenda($idagenda){

		$data['agenda'] =$this->Calendar_model->getagendamento($idagenda);

		$idcliente = $this->Calendar_model->getidcliente($idagenda);

			$this->load->model('Cliente_model');
	$data['cliente'] = $this->Cliente_model->get_cliente($idcliente);

		$data['servicos'] = $this->Calendar_model->itens($idagenda);


		$this->load->view('include/header');
		$this->load->view('agenda/agendavenda',$data);
		$this->load->view('include/footer');


	}

	/*Get all Events */

	Public function getEvents()
	{
		$result=$this->Calendar_model->getEvents();
		echo json_encode($result);
	}
	/*Add new event */
public function faturar(){

	$idagenda = $this->input->post('id');


	if($this->Calendar_model->getagenda('itensagenda', $idagenda) == true){

			echo json_encode(array('result'=> true));
	}else{
			echo json_encode(array('result'=> false));
	}
}

	public function add(){



		$verifica = $this->input->post('valorserv')[0];
			if($verifica>1)
	        {

		$count = count($this->input->post('valorserv'));

		$subtotal = 0;

		for ($i=0; $i < $count; $i++){

				$vlritem = $this->input->post('valorserv')[$i];

				$subtotal += $vlritem;

		}

		$params = array(
'idatendente' => $this->input->post('resource')[0],
'idcliente' => $this->input->post('idcliente')[0],
'nomecliente' => $this->input->post('nome')[0],
'data' => $this->input->post('databr')[0],
'hora' => $this->input->post('hora')[0],
'nomeatend' => $this->input->post('nomeatendente')[0],
'status' => $this->input->post('status')[0],
'subtotal' => $subtotal

		);

		  $agenda_id = $this->Calendar_model->addagenda($params);






	# code...
$count = count($this->input->post('valorserv'));

$subtotal = 0;

for ($i=0; $i < $count; $i++){

		$vlritem = $this->input->post('valorserv')[$i];

		$subtotal += $vlritem;

}
for($i=0; $i< $count;$i++){
	$itens = array(

			'idagenda' => $agenda_id,
			'valorservico' =>  $this->input->post('valorserv')[$i],

			'nomeservico' => $this->input->post('nomeservico')[$i],
			'comissao' => $this->input->post('comissao')[$i],
			'nomecliente' => $this->input->post('nome')[0],
			'idservico' =>  $this->input->post('idservico')[$i],
			'idatendente' => $this->input->post('resource')[$i],
			'start' =>  $this->input->post('dataInicial')[$i],
			'nomeatendente' =>  $this->input->post('nomeatendente')[$i],
			'hora' =>  $this->input->post('hora')[$i],
			'end' =>  $this->input->post('end')[$i],
			'status' => $this->input->post('status')[$i],
			'cor' =>$this->input->post('cor')[$i]


	);

		$itens = $this->Calendar_model->itensagenda($itens);


}
            redirect('calendar/index');

}

else{

	$this->load->view('include/header');
	$this->load->view('agenda/agenda');
	$this->load->view('include/footer');
}

}


public function listaagenda(){



	    $this->load->model('Agenda_model');

$data['itensagenda'] = $this->Agenda_model->get_all_agendas();
	$this->load->view('include/header');
	$this->load->view('agenda/listaagenda',$data);
	$this->load->view('include/footer');

}

	public function addtrava(){


		$params = array(
		'idatendente' => $this->input->post('atendente'),
		'idcliente' => $this->input->post('idcliente'),
		'status' => $this->input->post('status')

		);

			$agenda_id = $this->Calendar_model->addagenda($params);

$itens = array(


	'idagenda' => $agenda_id,
		'idatendente' => $this->input->post('atendente'),
		'start' =>  $this->input->post('datepicker'),
		'hora' =>  $this->input->post('hora'),
		'nomecliente' => $this->input->post('nome'),
		'status'=> $this->input->post('status'),
		'nomeservico' => $this->input->post('nomeservico'),
		'comissao' => $this->input->post('comissao'),
		'end' =>  $this->input->post('end'),
		'cor' => $this->input->post('cor')




);

	$itens = $this->Calendar_model->itensagenda($itens);

	 redirect(base_url('calendar'));



	}

	public function addtable(){

		$params = array(
'idatendente' => $this->input->post('idatendente'),
'idcliente' => $this->input->post('idcliente'),
'status' => $this->input->post('status')

		);

		  $agenda_id = $this->Calendar_model->addagenda($params);



$itens = array(

		'idagenda' => $agenda_id,
		'idservico' =>  $this->input->post('idservico'),
		'idatendente' => $this->input->post('idatendente'),
		'start' =>  $this->input->post('dataInicial'),
		'hora' =>  $this->input->post('hora'),
		'end' =>  $this->input->post('end')


);

	if($this->Calendar_model->itensagenda($itens) == TRUE){

	echo json_encode(array('result'=> true));
        }else{
            echo json_encode(array('result'=> false));
        }


	}



	Public function addEvent()
	{
		$result=$this->Calendar_model->addEvent();
		echo $result;
	}
	/*Update Event */
	Public function updateEvent()
	{
		$result=$this->Calendar_model->updateEvent();
		echo $result;
	}

	public function listausuarios(){


		         $event = $this->Calendar_model->listausuariosagenda();
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

public function listaeventos(){

	$event = $this->Calendar_model->listaeventos();



	$obj =NULL;
	foreach ($event as $i) {
	$obj[] = [
		'title' => $i['nomeservico'],


	        'start' => $i['inicio'],
 'end' => $i['fim'],
	        'description' =>$i['idagenda'],
					'resourceId' => $i['idatendente'],
					'backgroundColor' => $i['cor']



	];


	}
	echo json_encode($obj);
	exit();
}

	/*Delete Event*/
	Public function deleteEvent()
	{
		$result=$this->Calendar_model->deleteEvent();
		echo $result;
	}
	Public function dragUpdateEvent()
	{

		$result=$this->Calendar_model->dragUpdateEvent();
		echo $result;
	}

	public function delete(){

		$id = $this->input->post('id');


		if($this->Calendar_model->delete('itensagenda','idagenda',$id)==TRUE);
					redirect(base_url().'calendar/index');
	}

	public function autoCompleteServico(){

			if (isset($_GET['term'])){
					$q = strtolower($_GET['term']);
					$this->Calendar_model->autoCompleteServico($q);
			}

	}

	public function autoCompleteCliente(){

			if (isset($_GET['term'])){
					$q = strtolower($_GET['term']);
					$this->Calendar_model->autoCompleteCliente($q);
			}

	}



}
