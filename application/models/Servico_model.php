<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Servico_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get servico by idservico
     */
    function get_servico($idservico)
    {
        return $this->db->get_where('servico',array('idservico'=>$idservico))->row_array();
    }

    /*
     * Get all servicos
     */
    function get_all_servicos()
    {
        $this->db->order_by('idservico', 'desc');
        return $this->db->get('servico')->result_array();
    }

    /*
     * function to add new servico
     */
    function add_servico($params)
    {
        $this->db->insert('servico',$params);
        return $this->db->insert_id();
    }
    public function addpacote($params){

    	$this->db->insert('servico',$params);
    return $this->db->insert_id();
    }

    public function itempacote($itens){

    	$this->db->insert('item_serv',$itens);
    	return $this->db->insert_id();
    }
    /*
     * function to update servico
     */
    function update_servico($idservico,$params)
    {
        $this->db->where('idservico',$idservico);
        return $this->db->update('servico',$params);
    }

    /*
     * function to delete servico
     */
    function delete_servico($idservico)
    {
        return $this->db->delete('servico',array('idservico'=>$idservico));
    }
}
