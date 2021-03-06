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
$status = $this->input->post('status');
				if($tiposervico==2){
				$start= $this->input->post('start')[$i];
					$hora= $this->input->post('hora')[$i];
					$end = $this->input->post('end')[$i];
				}

					if(($status=='2') and ($tiposervico!='2')){

							$iditensagenda = $this->input->post('iditem')[$i];
						$params = array(


							'start'=> $start,
							'hora'=> $hora,
							'end' => $end,
							'status' => $status

						);
					if($this->Calendar_model->confirmaservrealizado($iditensagenda,$params)== true){


							$tipomov =2;
						$comissao = array(
									'idfunc' =>$this->input->post('prof')[$i],
									'data'=>$this->input->post('databr')[$i],
									'valor' =>$this->input->post('comissao')[$i],
									'nomefunc'=>$this->input->post('nomeatendente')[$i],
									'tipomov'=> $tipomov
						);
						$this->load->model('Salario_model');
						$sal = $this->Salario_model->comissao($comissao);
					}
					return false;
					}

					}

echo json_encode(array('result' =>true));
			}



public function confirma(){

$count=count($this->input->post('start'));
$indice=0;
for($i=0;$i<$count;$i++){

$iditem=$this->input->post('iditem')[$i];
$status=isset($this->input->post('status')[$i]);

$tiposerv=$this->input->post('tiposerv')[$i];
if($tiposerv!=2){
		if(isset($this->input->post('status')[$i])!=null){
			$params = array(
						'start'=>$this->input->post('start')[$i],
						'hora'=>$this->input->post('hora')[$i],
						'end'=>$this->input->post('end')[$i],
						'status'=>$this->input->post('status')[$i]

			);
			if($this->Calendar_model->confirma($iditem,$params)!=null){

				$tipomov =2;
			$comissao = array(
						'idfunc' =>$this->input->post('prof')[$i],
						'data'=>$this->input->post('databr')[$i],
						'valor' =>$this->input->post('comissao')[$i],
						'nomefunc'=>$this->input->post('nomeatendente')[$i],
						'tipomov'=> $tipomov
			);
			$this->load->model('Salario_model');
			$sal = $this->Salario_model->comissao($comissao);

				$indice++;
			}

}
}

}

if($indice>0){
					echo json_encode(array('result'=> true));
			}else{
					echo json_encode(array('result'=> false));
			}



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
'start' =>  $this->input->post('dataInicial')[0],
	'end' =>  $this->input->post('end')[0],
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
  redirect('calendar/index');





}}
$this->load->view('include/header');
$this->load->view('include/footer');
$this->load->view('agenda/agenda');
}
}


public function listaagenda(){
  $this->load->model('Agenda_model');
	$this->load->model('Calendar_model');
	  $this->load->library('table');
$this->load->library('pagination');
		// init params
	    //    $params = array();
	      //  $limit_per_page = 10;
	       // $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	       // $total_records =


            // get current page records


            $config['base_url'] = base_url() . 'calendar/listaagenda';
            $config['total_rows'] = $this->Calendar_model->get_total();
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
  $data["results"] = $this->Calendar_model->get_current_page_records($config['per_page'],$this->uri->segment(3));
            // build paging links
            $data["links"] = $this->pagination->create_links();



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
