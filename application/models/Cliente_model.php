<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Cliente_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get cliente by idcliente
     */
    function get_cliente($idcliente)
    {
        return $this->db->get_where('cliente',array('idcliente'=>$idcliente))->row_array();
    }

    /*
     * Get all clientes
     */
     public function get_total() {

     		return $this->db->count_all("cliente");
     }


    public function  get_current_page_records($limit, $start){
      $this->db->order_by('idcliente','desc');
       $this->db->limit($limit,$start);

       $query = $this->db->get("cliente");

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

    function get_all_clientes()
    {
        $this->db->order_by('idcliente', 'desc');

          return $this->db->get('cliente')->result_array();

    }



    public function count() {
        return $this->db->count_all("cliente");
    }

    /*
     * function to add new cliente
     */
    function add_cliente($params)
    {
        $this->db->insert('cliente',$params);
        if ($this->db->affected_rows() == '1')
{
  return TRUE;
}

return TRUE;
    }



    function getnome($idservicos){


      $this->db->select('nome');
    $this->db->from('cliente');
    $this->db->where('idcliente', $idservicos);
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

    return $row->nome;
    }

    }
    /*
     * function to update cliente
     */
    function update_cliente($idcliente,$params)
    {
        $this->db->where('idcliente',$idcliente);
        return $this->db->update('cliente',$params);
    }

    /*
     * function to delete cliente
     */
    function delete_cliente($idcliente)
    {
        return $this->db->delete('cliente',array('idcliente'=>$idcliente));
    }
}
