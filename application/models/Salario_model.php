<?php

class Salario_model extends CI_Model {

	function __construct()
	{
			parent::__construct();
	}



public function pgtofunc($func){

$this->db->insert('salario',$func);

if ($this->db->affected_rows() == '1')
{
  return TRUE;
}
else{
return FALSE;

}
}

}
