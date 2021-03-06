<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Itensagenda_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get itensagenda by iditensagenda
     */
    function get_itensagenda($iditensagenda)
    {
        return $this->db->get_where('itensagenda',array('iditensagenda'=>$iditensagenda))->row_array();
    }
        
    /*
     * Get all itensagenda
     */
    function get_all_itensagenda()
    {
        $this->db->order_by('iditensagenda', 'desc');
        return $this->db->get('itensagenda')->result_array();
    }
        
    /*
     * function to add new itensagenda
     */
    function add_itensagenda($params)
    {
        $this->db->insert('itensagenda',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update itensagenda
     */
    function update_itensagenda($iditensagenda,$params)
    {
        $this->db->where('iditensagenda',$iditensagenda);
        return $this->db->update('itensagenda',$params);
    }
    
    /*
     * function to delete itensagenda
     */
    function delete_itensagenda($iditensagenda)
    {
        return $this->db->delete('itensagenda',array('iditensagenda'=>$iditensagenda));
    }
}
