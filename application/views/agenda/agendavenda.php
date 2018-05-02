
<section id="main-content">
  <section class="wrapper">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>



            <div class="panel-body">
              <div class="tab-content">
                <div id="home" class="tab-pane active">


                  <div class="row">
                      <div class="col-lg-12">
                          <section class="panel">
                              <header class="panel-heading">
                                  Agendamento
                                  </header>
                                    <div class="panel-body">
<div class="row">

  <div class="col-lg-3">
    <h4><strong>Cliente: </strong><?php echo $cliente['nome'] ;?> <?php echo  $cliente['sobrenome']; ?> </h4>
  </div>

  <div class="col-lg-3">
      <h4><strong>Tel fixo: </strong><?php echo $cliente['telefonefixo'] ;?></h4>
  </div>

  <div class="col-lg-3">
    <h4><strong>Celular: </strong><?php echo $cliente['telefonecelular'] ;?></h4>
  </div>

  <div class="col-lg-2">
        <h4><strong>Data: <?php echo $agenda['data'] ;?></strong></h4>
    </div>
                                      <div class="col-lg-1">
                                            <h4><strong>Nº <?php echo $agenda['idagenda'] ;?></strong></h4>
                                        </div>









  <label for="">&nbsp</label>
                                        <div class="col-lg-4">
                                          <h4>Endereço:</h4>
                                        </div>
                                        <div class="col-lg-3">
                                          <h4>Bairro:</h4>
                                        </div>

                                        <div class="col-lg-3">
                                          <h4>Cidade:</h4>
                                        </div>
<label for="">&nbsp</label>




</div>


<div class="row">
                                      <header class="panel-heading">
                                          Serviços
                                          </header>

<div class="col-lg-12">
    <label for="">&nbsp</label>
</div>

  <form id="formServicos" action="<?php echo base_url() ?>calendar/adicionarserv" method="post">
<div class="col-lg-8">
                                <div class="form-group">
                      						<label for="idservico" class="control-label">Serviços</label>

                                  <input type="text" class="form-control" name="servico" id="servico" placeholder="Digite o nome do serviço" />

                                  <input type="hidden" name="idservico" id="idservico" value=""/>





                                  <input type="hidden" name="valorserv" id="valorserv" />
                                  <input type="hidden" name="comissao" id="comissao" />
                                  <input type="hidden" name="nomeservico" id="nomeservico" />

                      					</div>
                              </div>

                            </form>
<label for="">&nbsp</label>
<div class="col-lg-4">
  <label for="">&nbsp</label>
<input type="submit" class="btn btn-success" name="inserirservico" value="INSERIR SERVIÇO" />
</div>


              <section class="panel">
                <div id="divServicos">
              <table class="table table-bordered">
                                                      <thead>
                                                        <tr>
<div class='row'>
  <td class="col-xs-2 col-sm-2 col-md-2 col-lg-1">Serviço executado?</td>
                                                          <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Atendente</td>

                                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Serviço</td>
                                                        <td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Valor</td>
                                                        <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Ações</td>

                                                      </div>
                                                        </tr>
                                                      </thead>
                                                      <tbody>

                                                        <?php
                            $totalserv = 0;
                            foreach ($servicos as $s) {
                                $totalserv +=$s->valorservico;
                                echo '<tr>'; ?>


                                <td>

                                  <div class="btn-row">
                                                    <div class="btn-group" data-toggle="buttons">
                                                      <label class="btn btn-default active">
                                                                            <input type="radio" name="statusitem" id="statusitem" value="2">  SIM
                                                                        </label>
                                                      <label class="btn btn-default">
                                                                            <input type="radio" name="statusitem" id="statusitem" value="1"> NÃO
                                                                        </label>
</div></div>


                                </td>
                            <?php    echo '<td>'.$s->nomeatendente.'</td>';
                                echo '<td>'.$s->nomeservico.'</td>';
                                echo '<td>R$ '.$s->valorservico.',00</td>'; ?>


                            <td>  <button class="btn btn-danger" onclick="RemoveTableRow(this)" type="button">REMOVER</button> </td>
                          <?php      echo '</tr>';
                            }?>

                                                      </tbody>
                                                    </table>

                                                  </div>
                                                    </section>

</div>


<div class="row">
                                      <header class="panel-heading">
                                          Produtos
                                          </header>
                                          <div class="box-body">


                                            <table class="table table-bordered">
                                                                                    <thead>
                                                                                      <tr>

                                                                                        <td>Produto</td>

                                                                                      <td>Quantidade</td>
                                                                                      <td>Valor UN</td>
                                                                                      <td>SubTotal</td>
                                                                                      <td>Ações</td>
                                                                                      </tr>
                                                                                    </thead>
                                                                                    <tbody>

                                                                                    </tbody>
                                                                                  </table>

                                          </div>
</div>


<div class="row">
                                      <header class="panel-heading">
                                          Financeiro
                                          </header>

                                          <div class="box-body">

                                            <div class="col-lg-9">

                                            </div>
                                            <div class="col-lg-3">
                                              <h4>SERVIÇOS: <strong> R$<?php echo $totalserv ?>,00</strong></h4>
                                            </div>

                                            <div class="col-lg-9">

                                            </div>
                                            <div class="col-lg-3">
                                              <h4>PRODUTOS:</h4>
                                            </div>

                                            <div class="col-lg-9">

                                            </div>
                                            <div class="col-lg-3">
                                              <h4>TOTAL: <strong> R$<?php echo $totalserv ?>,00</strong></h4>
                                            </div>
<div class="col-lg-6">
</div>

<div class="col-lg-1">
  <a href="#" class="btn btn-primary"><span class="fa fa-money"></span> SALVAR</a>
</div>
<div class="col-lg-1">
  <a href="#" class="btn btn-danger"><span class="fa fa-money"></span> EXCLUIR</a>
</div>

<div class="col-lg-1">
  <?php if ($agenda['status'] == 1) {
                                ?>
                                              <a href="#modal-faturar" id="btn-faturar" role="button" data-toggle="modal" class="btn btn-success"><i class="icon-file"></i> RECEBER</a>
                                          <?php
                            } ?>


</div>
                                          </div>
</div>


                                    </div>







                                  </section>
                                </div>



                              </div>





                </div>

              </div>
            </div>


            <div class="modal fade" id="modal-faturar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">RECEBER</h4>
                                </div>
                                <div class="modal-body">

                                  <?php echo form_open('contasareceber/faturavenda') ?>
                                  <div class="box-body">

                                    <div class="row">
                                      <div class="col-lg-5">
                                      Cliente: </strong><?php echo $cliente['nome'] ;?> <?php echo  $cliente['sobrenome']; ?>
                                    </div>
                                    <div class="col-lg-3">

                                      Data: <?php echo $agenda['data'] ;?>
                                    </div>
                                    <div class="col-lg-4">
                                          <h4>TOTAL: <strong> R$<?php echo $totalserv ?>,00</strong></h4>
                                    </div>
                                    </div>
<div class="row">
    <label for="">&nbsp</label>
    <?php date_default_timezone_set('America/Sao_Paulo'); ?>
        <input type="hidden" name="status" value="FECHADO">
        	<input type="hidden" name="datavencimento" value="<?php
 echo date('d/m/Y') ;?>" class="has-datepicker form-control" id="datepicker1" />
          <input type="hidden" name="datapagamento" value="<?php echo date('d/m/Y') ;?>" class="has-datepicker form-control" id="datepicker" />

          <input type="hidden" name="idagendamento" id="idagendamento" value="<?php echo $agenda['idagenda'] ;?>" />

            <input type="hidden" name="descricao" value="Venda - <?php echo $agenda['idagenda'] ;?> / Cliente:<?php echo $cliente['nome'] ;?> <?php echo  $cliente['sobrenome']; ?>"/>

            <input type="hidden" name="corfech" id="corfech" value="#00FF7F" />

<input type="hidden" name="itemstatus" id="itemstatus" value="2" />


          <input type="hidden" name="valor"  value="<?php echo $totalserv ?>"/>

                                  <div class="col-lg-5">

                                    <label for="formarecebimento" class="control-label">Forma Recebimento</label>
                                    <select name="formarecebimento" class="form-control">
                                      <option value=""> Selecione</OPTION>
                                      <option value="DINHEIRO"> DINHEIRO</OPTION>
                                        <option value="CARTÃO DE CREDITO"> CARTÃO DE CRÉDITO</OPTION>
                                          <option value="CARTÃO DE DEBITO"> CARTÃO DE DÉBITO</OPTION>
                                            <option value="CHEQUE"> CHEQUE</OPTION>



                                      </select>
                                    </div>

                                  </div>
                                  </div>



                                </div>
                                <div class="modal-footer">
                                  <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                <button type="submit" class="btn btn-success">FATURAR</button>
                                </div>
  <?php echo form_close(); ?>
                              </div>


                            </div>
                          </div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.1.5.js"></script>

            <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
            <script src="<?php echo base_url();?>assets/js/maskmoney.js"></script>


<script>
$(document).ready(function(){








                  $("#servico").autocomplete({

                      source: "<?php echo base_url(); ?>calendar/autoCompleteServico",

                      minLength: 2,

                      select: function(event, ui) {



                          $("#idservico").val(ui.item.idservico);

                          $("#valorserv").val(ui.item.valorserv);
                            $("#comissao").val(ui.item.comissao);

                              $("#nomeservico").val(ui.item.nomeservico);







                      }

                  });


                  $("#formServicos").validate({

          submitHandler: function( form ){
                 var dados = $( form ).serialize();

                $("#divServicos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                  type: "POST",
                  url: "#",
                  data: dados,
                  dataType: 'json',
                  success: function(data)
                  {
                    if(data.result == true){
                        $( "#divServicos" ).load("<?php echo current_url();?> #divServicos" );
                        $("#servico").val('').focus();
                    }
                    else{
                        alert('Ocorreu um erro ao tentar adicionar serviço.');
                    }
                  }
                  });

                  return false;
                }

       });

                });
                </script>
