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
		$this->load->view('include/footer');
		$this->load->view('agenda/agenda',$data);

	}

	function agendavenda($idagenda){

		$data['agenda'] =$this->Calendar_model->getagendamento($idagenda);
		$this->load->model('Atendente_model');
				$data['all_atendentes'] = $this->Atendente_model->get_all_atendentes();

		$idcliente = $this->Calendar_model->getidcliente($idagenda);

			$this->load->model('Cliente_model');
	$data['cliente'] = $this->Cliente_model->get_cliente($idcliente);



		$data['servicos'] = $this->Calendar_model->itens($idagenda);

		$idservico = $this->Calendar_model->getidservico($idagenda);

	$this->load->model('Servico_model');
      $data['itenspacote'] = $this->Servico_model->get_itens($idservico);

		$this->load->view('include/header');
		$this->load->view('agenda/agendavenda',$data);
		$this->load->view('include/footer');


	}

	public function confirmaservrealizado(){




			for($i=0; $i<3 ; $i++){

				$tiposervico = $this->input->post('tiposervico')[$i];
					$status = $this->input->post('status')[$i];
				if($tiposervico==2){
				$start= $this->input->post('start')[$i];
					$hora= $this->input->post('hora')[$i];
					$end = $this->input->post('end')[$i];
				}

					if($status ==2 and $tiposervico!=2){

							$iditensagenda = $this->input->post('iditem')[$i];
						$params = array(


							'start'=> $start,
							'hora'=> $hora,
							'end' => $end,
							'status' => $status

						);
						$qq=$this->Calendar_model->confirmaservrealizado($iditensagenda,$params);


					}


			}
echo json_encode(array('result' =>true));

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


$count = count($this->input->post('valorserv'));

$subtotal = 0;

for ($i=0; $i < $count; $i++){

		$vlritem = $this->input->post('valorserv')[$i];

		$subtotal += $vlritem;

}


for($i=0; $i< $count;$i++){

	$tiposerv = $this->input->post('tiposervico')[$i];
	if($tiposerv == 1){

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
			'cor' =>$this->input->post('cor')[$i],
			'tiposerv'=>$this->input->post('tiposervico')[$i]

	);

$itens = $this->Calendar_model->itensagenda($itens);




}

elseif ($tiposerv==2) {

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
			'cor' =>$this->input->post('cor')[$i],
			'tiposerv'=>$this->input->post('tiposervico')[$i]

	);

$itens = $this->Calendar_model->itensagenda($itens);

			$idpac = $this->input->post('idservico')[$i];

			$itenspacote = $this->Calendar_model->getitenspacote($idpac);

			foreach ($itenspacote as $a) {
				$pac = array(
							'idagenda' => $agenda_id,
							'nomeservico'=> $a['nomeserv'],
							'nomecliente'=>$this->input->post('nome')[0],
							'idatendente' =>$this->input->post('resource')[$i],
							'nomeatendente'=>$this->input->post('nomeatendente')[$i],
							'status'=>$this->input->post('status')[$i],
							'comissao'=> $a['comissao']

				);
				$aaa = $this->Calendar_model->itensagenda($pac);
			}

			////////////////////////////////////////////////


	}

}
  redirect('calendar/index');





}
$this->load->view('include/header');
$this->load->view('include/footer');
$this->load->view('agenda/agenda');

}


public function listaagenda(){
  $this->load->model('Agenda_model');
	$this->load->model('Calendar_model');
	  $this->load->library('table');
$this->load->library('pagination');

				$params = array();
        $limit_per_page = 2;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->Calendar_model->count('agenda');

				if ($total_records > 0)
        {
            // get current page records
            $data["itensagenda"] = $this->Calendar_model->get_current_page_records($limit_per_page, $page*$limit_per_page);

            $config['base_url'] = base_url() . 'calendar/listaagenda';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;

            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;

            $config['full_tag_open'] = '<div class="pagination">';
            $config['full_tag_close'] = '</div>';

            $config['first_link'] = 'First Page';
            $config['first_tag_open'] = '<span class="firstlink">';
            $config['first_tag_close'] = '</span>';

            $config['last_link'] = 'Last Page';
            $config['last_tag_open'] = '<span class="lastlink">';
            $config['last_tag_close'] = '</span>';

            $config['next_link'] = 'Next Page';
            $config['next_tag_open'] = '<span class="nextlink">';
            $config['next_tag_close'] = '</span>';

            $config['prev_link'] = 'Prev Page';
            $config['prev_tag_open'] = '<span class="prevlink">';
            $config['prev_tag_close'] = '</span>';

            $config['cur_tag_open'] = '<span class="curlink">';
            $config['cur_tag_close'] = '</span>';

            $config['num_tag_open'] = '<span class="numlink">';
            $config['num_tag_close'] = '</span>';

            $this->pagination->initialize($config);

            // build paging links
            $data["links"] = $this->pagination->create_links();
        }


$data['itensagenda'] = $this->Agenda_model->get_all_agendas();

	$this->load->view('include/header');
	$this->load->view('agenda/listaagenda',$data);
	$this->load->view('include/footer');

}


public function adicionarserv(){

$count = count($this->input->post('nomeservico'));

if($count>1){
			for($i=0; $i< $count;$i++){
				$status = $this->input->post('status')[$i];
			//	$start = null;
			//	$hora = null;
			//	$end = null;
				$statusatual=1;

if($status==2){
	$statusatual=2;
}



				//	$statusatual=2;


				$serv = array (
						'idagenda' => $this->input->post('idagenda')[$i],
						'nomeservico' => $this->input->post('nomeservico')[$i],
						'idservico' => $this->input->post('idservico')[$i],
						'comissao' => $this->input->post('comissao')[$i],
					//	'start' => $start,
				//		'hora'=> $hora,
					//	'end'=> $end,
						'valorservico' => $this->input->post('valorserv')[$i],
						'status' => $statusatual,
						'idatendente' => $this->input->post('atendente')[$i],

				);
			$t=	$this->Calendar_model->addservagenda($serv);
			}
			echo json_encode(array('result' => true));

}
	$serv = array (
			'idagenda' => $this->input->post('idagenda'),
			'nomeservico' => $this->input->post('nomeservico'),
			'idservico' => $this->input->post('idservico'),
			'comissao' => $this->input->post('comissao'),
			'valorservico' => $this->input->post('valorserv'),

	);

	if($this->Calendar_model->addservagenda($serv) ==true){
		echo json_encode(array('result' => true));
	}

	else{
		echo json_encode(array('result' =>false));
	}



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

				public function getitenspacote(){

						$idservico = $this->input->post('idservico');
					$data['itenspacote'] = $this->Calendar_model->getitenspacote($idservico);

echo json_encode($data);
				}

				public function removeservicoagenda(){

					$idservico = $this->input->post('idserv');

					$this->load->model('Servico_model');




						if($this->Servico_model->deleteserv($idservico)== true){

							echo json_encode(array('result'=> true));

						}
						else{
									echo json_encode(array('result'=> false));
							}


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

	public function autoCompleteProduto(){

			if (isset($_GET['term'])){
					$q = strtolower($_GET['term']);
					$this->Calendar_model->autoCompleteProduto($q);
			}

	}

	public function autoCompleteCliente(){

			if (isset($_GET['term'])){
					$q = strtolower($_GET['term']);
					$this->Calendar_model->autoCompleteCliente($q);
			}

	}



}
