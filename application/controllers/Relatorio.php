<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        if( (!session_id()) || (!$this->session->userdata('logado'))){
            redirect('dashboard/index');
}
        $this->load->model('Relatorio_model');
    }


    function index()
    {


    }




    function comissao()
{

  $this->load->model('Atendente_model');
  		$data['all_atendentes'] = $this->Atendente_model->get_all_atendentes();
      $this->load->model('Relatorio_model');
$data['relatorio'] = 0;
      $this->load->view('include/header');
      $this->load->view('relatorio/comissao',$data);
      $this->load->view('include/footer');


    }

    function consultacomissao(){

          $inicio = $this->input->post('inicio');
          $termino = $this->input->post('termino');
          $idatendemte = $this->input->post('atendente');
          if($idatendemte=='todos'){
              $data['relatorio'] = $this->Relatorio_model->consultacomissaotodos($inicio,$termino);
          }
          $this->load->model('Atendente_model');
              $data['all_atendentes'] = $this->Atendente_model->get_all_atendentes();

          $data['relatorio'] = $this->Relatorio_model->consultacomissao($inicio,$termino,$idatendemte);

          $this->load->view('include/header');
          $this->load->view('relatorio/comissao',$data);
          $this->load->view('include/footer');


    }



}
