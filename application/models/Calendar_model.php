<?php

class Calendar_model extends CI_Model {

	function __construct()
	{
			parent::__construct();
	}


/*Read the data from DB */
	Public function getEvents()
	{

	$sql = "SELECT * FROM events WHERE events.start BETWEEN ? AND ? ORDER BY events.start ASC";
	return $this->db->query($sql, array($_GET['start'], $_GET['end']))->result();

	}

/*Create new events */

public function confirma($idtem,$params){
	$this->db->set($params);
	$this->db->where('iditensagenda',$idtem);
  return $this->db->update('itensagenda');



}

public function addagenda($params){

	$this->db->insert('agenda',$params);
return $this->db->insert_id();
}

public function itensagenda($itens){

	$this->db->insert('itensagenda',$itens);
	return $this->db->insert_id();
}

public function addservagenda($serv){

	$this->db->insert('itensagenda',$serv);

	if ($this->db->affected_rows() == '1')
	{
		return TRUE;
	}
else{
	return FALSE;

}


}

public function itens($idagenda){

	$this->db->select('*');
$this->db->from('itensagenda');
$this->db->where('idagenda', $idagenda);

  return $this->db->get()->result();

}

public function buscatiposervico($idagenda){



	return $this->db->get_where('itensagenda',array('idagenda'=>$idagenda))->row_array();
}

public function getidcliente($idagenda){



					$this->db->select('idcliente');
		    $this->db->from('agenda');
		    $this->db->where('idagenda', $idagenda);
		    $this->db->limit(1);

		    $query = $this->db->get();

		    if ($query->num_rows() == 1)
		    {
		    //Use row() to get a single result
		    $row = $query->row();

		    //$row will now have if you printed the contents:
		    //print_r( $row );
		    //stdClass Object ( [email] => example@gmail.com )

		    //Pass $query->email directly to reset_password

		    return $row->idcliente;
		    }

}

function getidservico($idagenda){

	$this->db->select('idservico');
$this->db->from('itensagenda');
$this->db->where('idagenda', $idagenda);
$this->db->limit(1);

$query = $this->db->get();

if ($query->num_rows() == 1)
{
//Use row() to get a single result
$row = $query->row();

//$row will now have if you printed the contents:
//print_r( $row );
//stdClass Object ( [email] => example@gmail.com )

//Pass $query->email directly to reset_password

return $row->idservico;
}
}


function confirmaservrealizado($iditensagenda,$params){

	$this->db->where('iditensagenda',$iditensagenda);
	 return $this->db->update('itensagenda',$params);



}

function update_serv($idag,$itemstatus){
				$this->db->set('status',$itemstatus);
				$this->db->where('idagenda',$idag);
				return $this->db->update('itensagenda');

}

function update_status($idag,$statusfechado){
	$this->db->set('status',$statusfechado);
	$this->db->where('idagenda',$idag);
	return $this->db->update('agenda');

}

function update_cor($idag,$cor){
	$this->db->set('cor',$cor);
	$this->db->where('idagenda',$idag);
	return $this->db->update('itensagenda');

}

public function get_total() {

		return $this->db->count_all("agenda");
}

public function get_current_page_records($limit, $start)
    {

				$this->db->order_by('idagenda','desc');
        $this->db->limit($limit, $start);

        $query = $this->db->get("agenda");

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }





public function autoCompleteServico($q){

		$this->db->select('*');
		$this->db->limit(5);
		$this->db->like('nomeservico', $q);
		$query = $this->db->get('servico');
		if($query->num_rows() > 0){
				foreach ($query->result_array() as $row){
						$row_set[] = array('label'=>$row['nomeservico'].' | Preço: R$ '.$row['valorserv'],'idservico'=>$row['idservico'],'comissao'=>$row['comissao'],'valorserv'=>$row['valorserv'],'tiposervico'=>$row['tiposervico'], 'nomeservico'=>$row['nomeservico']);
				}
				echo json_encode($row_set);
		}
}

public function autoCompleteCliente($q){

		$this->db->select('*');
		$this->db->limit(5);
		$this->db->like('nome', $q);
		$query = $this->db->get('cliente');
		if($query->num_rows() > 0){
				foreach ($query->result_array() as $row){
						$row_set[] = array('label'=>$row['nome'].' '.$row['sobrenome'].' | Telefone: '.$row['telefonecelular'],'idcliente'=>$row['idcliente'],'nome'=>$row['nome']);
				}
				echo json_encode($row_set);
		}
}


public function autoCompleteProduto($q){

		$this->db->select('*');
		$this->db->limit(5);
		$this->db->like('nome', $q);
		$query = $this->db->get('produto');
		if($query->num_rows() > 0){
				foreach ($query->result_array() as $row){
						$row_set[] = array('label'=>$row['nome'].' | Preço: R$ '.$row['precovenda'],'idproduto'=>$row['idproduto'],'nome'=>$row['nome'],'precovenda'=>$row['precovenda']);
				}
				echo json_encode($row_set);
		}
}

public function listausuariosagenda(){

	$sql = "SELECT * from atendente where status='1'";
			 $query = $this->db->query($sql);
			 $array = $query->result_array();
			 return $array;
}

public function getitenspacote($idservico){

	return $this->db->get_where('item_serv',array('idpacote'=>$idservico))->result_array();
}

public function listaeventos(){

	//$sql = "SELECT concat (itensagenda.start, ' ', itensagenda.hora) as inicio, concat (itensagenda.start, ' ', itensagenda.end) as fim, concat ('Cliente: ',itensagenda.nomecliente,' - Serviço: ', itensagenda.nomeservico,' R$',itensagenda.valorservico,',00') as title, itensagenda.idatendente,itensagenda.idagenda,itensagenda.cor from itensagenda" ;
	$sql = "SELECT concat (itensagenda.start, ' ', itensagenda.hora) as inicio, concat (itensagenda.start, ' ', itensagenda.end) as fim, itensagenda.nomeservico,itensagenda.idatendente,itensagenda.cor,itensagenda.idagenda from itensagenda";
	$query = $this->db->query($sql);
	$array = $query->result_array();
	return $array;
}

public function getagenda($id){

	return $this->db-get('itensagenda','idagenda',$id);
}

public function getagendamento($idagenda){

		  return $this->db->get_where('agenda',array('idagenda'=>$idagenda))->row_array();
}




	function remove($id)
	{

	}



	Public function addEvent()
	{

	$sql = "INSERT INTO events (title,events.start,events.end,description, color) VALUES (?,?,?,?,?)";
	$this->db->query($sql, array($_POST['title'], $_POST['start'],$_POST['end'], $_POST['description'], $_POST['color']));
		return ($this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */

	Public function updateEvent()
	{

	$sql = "UPDATE events SET title = ?, description = ?, color = ? WHERE id = ?";
	$this->db->query($sql, array($_POST['title'],$_POST['description'], $_POST['color'], $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}


	/*Delete event */

	Public function deleteEvent($id)
	{

	$sql = "DELETE FROM itensagenda WHERE idagenda ='$id'";
	$this->db->query($sql);
		return ($this->db->affected_rows()!=1)?false:true;
	}



	function delete($table,$fieldID,$ID){
			$this->db->where($fieldID,$ID);
			$this->db->delete($table);
			if ($this->db->affected_rows() == '1')
	{
		return TRUE;
	}

	return FALSE;
	}
	/*Update  event */

	Public function dragUpdateEvent()
	{
			//$date=date('Y-m-d h:i:s',strtotime($_POST['date']));

			$sql = "UPDATE events SET  events.start = ? ,events.end = ?  WHERE id = ?";
			$this->db->query($sql, array($_POST['start'],$_POST['end'], $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;


	}






}
