<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Contasapagar_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get contasapagar by idcontasapagar
     */
    function get_contasapagar($idcontasapagar)
    {
        return $this->db->get_where('contasapagar',array('idcontasapagar'=>$idcontasapagar))->row_array();
    }

    /*
     * Get all contasapagars
     */
    function get_all_contasapagars($limit,$start)
    {
        $this->db->order_by('idcontasapagar', 'desc');
        $this->db->limit($limit, $start);

        $query = $this->db->get("contasapagar");

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

    function count_all(){

      return $this->db->count_all("contasapagar");
    }

    /*
     * function to add new contasapagar
     */
    function add_contasapagar($params)
    {
        $this->db->insert('contasapagar',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update contasapagar
     */
    function update_contasapagar($idcontasapagar,$params)
    {
        $this->db->where('idcontasapagar',$idcontasapagar);
        return $this->db->update('contasapagar',$params);
    }

    /*
     * function to delete contasapagar
     */
    function delete_contasapagar($idcontasapagar)
    {
        return $this->db->delete('contasapagar',array('idcontasapagar'=>$idcontasapagar));
    }
}
