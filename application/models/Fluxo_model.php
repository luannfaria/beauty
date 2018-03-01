<?php

/**
 *
 */
class Fluxo_model extends CI_Model
{

  function __construct() {
      parent::__construct();
  }

public function add($fluxo) {


  $this->db->insert('fluxocaixa',$fluxo);
	return $this->db->insert_id();
}

public function getfluxo($data){

  $this->db->where('data',$data);
  return $this->db->get('fluxocaixa')->result_array();


}

}
