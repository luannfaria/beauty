<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Relatorio_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


function consultacomissao($inicio,$termino,$idatendemte){

//  $sql=  "select * from itensagenda WHERE itensagenda.idatendente='$idatendemte' and itensagenda.start >= '$inicio' and itensagenda.start <= '$termino'";

  $this->db->where('idatendente',$idatendemte);
  $this->db->where('status','2');
  $this->db->where('start >=',$inicio);
  $this->db->where('start <=',$termino);
  return $this->db->get('itensagenda')->result_array();

}

function consultacomissaotodos($inicio,$termino){
  $this->db->select('*');
  $this->db->where('status','2');
  $this->db->where('tiposerv !=','2');
  $this->db->where('start >=',$inicio);
  $this->db->where('start <=',$termino);
  return $this->db->get('itensagenda')->result_array();
}

  }
