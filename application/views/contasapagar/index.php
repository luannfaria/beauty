<section id="main-content">
  <section class="wrapper">

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="#">Inicio</a></li>
                <li><i class="fa fa-dollar"></i> Contas a pagar</li>
              </ol>
            	<div class="box-tools">
                    <a href="<?php echo site_url('contasapagar/add'); ?>" class="btn btn-success">NOVO PAGAMENTO</a>
                  <a href="#pgtofunc" data-toggle="modal" class="btn btn-success">PAGAMENTO FUNC.</a>
                </div>
                <br>
            </div>
            <div class="box-body">
              <section class="panel">
                <table class="table table-striped">
                    <tr>
<th><i class="fa fa-sort-numeric-desc"></i> ID</th>
<th><i class="fa fa-cc"></i> Nº Documento</th>
						<th>Descrição</th>

						<th><i class="fa fa-dollar"></i> Valor</th>
						<th><i class="fa fa-calendar"></i> Data Vencimento</th>
						<th><i class="fa fa-calendar"></i> Data Pagamento</th>

						<th><i class="fa fa-gears"></i> Ações</th>
                    </tr>
                    <?php foreach($contasapagars as $c){ ?>
                    <tr>
<td><?php echo $c['idcontasapagar']; ?></td>
<td><?php echo $c['numero']; ?></td>
						<td><?php echo $c['descricao']; ?></td>

						<td><?php echo $c['valor']; ?></td>
						<td><?php echo $c['datavencimento']; ?></td>
						<td><?php echo $c['datapagamento']; ?></td>




                        <td>
                                      <?php if($c['datapagamento']!=NULL){ ?>
                                        <a href="#" class="btn btn-info"><span class="fa fa-pencil"></span> VISUALIZAR</a>

                                      <?php } ?>
                                    <?php if($c['datapagamento']==NULL){ ?>
                                        <a href="<?php echo site_url('contasapagar/edit/'.$c['idcontasapagar']); ?>" class="btn btn-success"><span class="fa fa-money"></span> PAGAR</a>
                                        <a href="<?php echo site_url('contasapagar/remove/'.$c['idcontasapagar']); ?>" class="btn btn-danger"><span class="fa fa-trash"></span> EXCLUIR</a>
                                      <?php } ?>
                                    </td>

                    </tr>
                    <?php } ?>
                </table>
</section>
            </div>


        </div>
    </div>
</div>


<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="pgtofunc" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Pagamento funcionarios</h4>
      </div>
      <div class="modal-body">

        <div class="box-body">

          <div class="row">

            <form id="formpgtofunc" action="<?php echo base_url() ?>salario/pgtofunc" method="post">
  <?php date_default_timezone_set('America/Sao_Paulo'); ?>
                  <div class="col-xs-3">
                    <div class="form-group">

                          <label>Data</label>
                  		<input type="text" name="data" value="<?php echo date('d/m/Y') ;?>" class="form-control" id="data" disabled/>
  <input type="hidden" name="datapagamento" value="<?php echo date('d/m/Y') ;?>" class="has-datepicker form-control" id="datepicker" />
                    </div>
                  </div>

                  <div class="col-xs-4">

                    <div class="form-group">

                          <label>Atendente</label>

                            <select name="atendente" class="form-control" required>
                              <option value="">Selecione um atendente</option>
                              <?php
                              foreach($all_atendentes as $atendente)
                              {
                                $selected = ($atendente['idatendente'] == $this->input->post('idatendente')) ? ' selected="selected"' : "";

                                echo '<option   value="'.$atendente['idatendente'].'" '.$selected.'>'.$atendente['nome'].'</option>';
                              }
                              ?>
                            </select>


                    </div>
                  </div>

                  <div class="col-xs-4">

                    <div class="form-group">
                          <label>Comissão/Vale</label>

                          <select name="salario_comissao" class="form-control" required>
                            <option value="">Selecione uma opção</option>
                              <option value="1">COMISSÃO</option>
                              <option value="2">SALARIO</option>
                          </select>
                    </div>
                  </div>

                  <div class="col-md-6">

                    <div class="form-group">

                      <label>Descrição</label>
                      	<input type="text" name="descricao" value="" class="form-control" id="descricao" required/>
                    </div>
                      </div>

                  <div class="col-xs-2">

                    <div class="form-group">

                      <label>Valor</label>
                      	<input type="text" name="valor" value="" class="form-control" id="valor" required/>
                        <input type="hidden" name="descricao" value="Pagamento funcionarios" />
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="formarecebimento" class="control-label">Forma pgto</label>

                    <div class="form-group">
                    <select name="formarecebimento" class="form-control" required>
                      <option value="">Selecione   </option>
                        <option value="DINHEIRO"> DINHEIRO</option>
                        <option value="CARTAO DE CREDITO"> CARTÃO DE CRÉDITO</option>
                        <option value="CARTAO DE DEBITO"> CARTÃO DE DÉBITO</option>
                        <option value="CHEQUE"> CHEQUE</option>
                    </select>
                    </div>
                  </div>

                      <div class="col-lg-4">
                        <label for="">&nbsp</label>
                        <div class="form-group">
                      <input type="submit" class="btn btn-success" name="entradacaixa" value="PAGAR" />
                    </div>
                      </div>
            </form>

          </div>
        </div>


      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.4.min.js"></script>


<script src="<?php echo base_url()?>assets/js/validate.js"></script>


  <script src="<?php echo base_url()?>assets/js/maskmoney.js"></script>
  <script type="text/javascript">



  $('#valor').maskMoney();


  $("#formpgtofunc").validate({
 rules:{
 valor: {required:true}
 },
 messages:{
 valor: {required: 'Insira um produto'}
 },
 submitHandler: function( form ){
  var dados = $( form ).serialize();


 $.ajax({
   type: "POST",
   url: "<?php echo base_url();?>salario/pgtofunc",
   data: dados,
   dataType: 'json',
   success: function(data)
   {
     if(data.result == true){

      window.location.href="<?php echo base_url();?>contasapagar";

     }
     else{
         alert('Ocorreu um erro ao tentar adicionar pagamento.');
     }
   }
   });

   return false;
 }

 });
  </script>
