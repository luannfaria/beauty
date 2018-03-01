<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model {


/*Read the data from DB */
	Public function getEvents()
	{

	$sql = "SELECT * FROM events WHERE events.start BETWEEN ? AND ? ORDER BY events.start ASC";
	return $this->db->query($sql, array($_GET['start'], $_GET['end']))->result();

	}

/*Create new events */


public function addagenda($params){

	$this->db->insert('agenda',$params);
return $this->db->insert_id();
}

public function itensagenda($itens){

	$this->db->insert('itensagenda',$itens);
	return $this->db->insert_id();
}


function update_status($idag,$statusfechado){
	$this->db->set('status',$statusfechado);
	$this->db->where('idagenda',$idag);
	return $this->db->update('agenda');

}

public function autoCompleteServico($q){

		$this->db->select('*');
		$this->db->limit(5);
		$this->db->like('nomeservico', $q);
		$query = $this->db->get('servico');
		if($query->num_rows() > 0){
				foreach ($query->result_array() as $row){
						$row_set[] = array('label'=>$row['nomeservico'].' | Preço: R$ '.$row['valorserv'],'idservico'=>$row['idservico'],'comissao'=>$row['comissao'],'valorserv'=>$row['valorserv'], 'nomeservico'=>$row['nomeservico']);
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

public function listausuariosagenda(){

	$sql = "SELECT * from atendente";
			 $query = $this->db->query($sql);
			 $array = $query->result_array();
			 return $array;
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
