<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Permissoes_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    function get_all_permissoes()
    {


      $this->db->order_by('idPermissao', 'desc');
      return $this->db->get('permissoes')->result_array();
    }



    function get_permissao($idPermissao)
    {
        return $this->db->get_where('permissoes',array('idPermissao'=>$idPermissao))->row_array();
    }


    function getById($idPermissao){
        $this->db->where('idPermissao',$idPermissao);
        $this->db->limit(1);
        return $this->db->get('permissoes')->row();
    }


    function update($table,$data,$fieldID,$ID){
      $this->db->where($fieldID,$ID);
      $this->db->update($table, $data);

      if ($this->db->affected_rows() >= 0)
  {
    return TRUE;
  }

  return FALSE;
  }


  }
