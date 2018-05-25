<section id="main-content">
  <section class="wrapper">

    <link href="<?php echo base_url()?>assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/css/daterangepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/css/bootstrap-colorpicker.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/css/jquery.timepicker.min.css" rel="stylesheet" />








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
    <h4><strong> <i class="fa fa-user"></i> Cliente: </strong><?php echo $cliente['nome'] ;?> <?php echo  $cliente['sobrenome']; ?> </h4>
  </div>

  <div class="col-lg-3">
      <h4><strong><i class="fa fa-phone"></i> Tel fixo: </strong><?php echo $cliente['telefonefixo'] ;?></h4>
  </div>

  <div class="col-lg-3">
    <h4><strong><i class="fa fa-mobile"></i> Celular: </strong><?php echo $cliente['telefonecelular'] ;?></h4>
  </div>

  <div class="col-lg-2">
      <h4><strong>  <i class="fa fa-calendar"></i> Data: <?php echo $agenda['data'] ;?></strong></h4>
    </div>
                                      <div class="col-lg-1">
                                            <h4><strong>Nº <?php echo $agenda['idagenda'] ;?></strong></h4>
                                        </div>









  <label for="">&nbsp</label>
                                        <div class="col-lg-4">
                                         <h4><i class="fa fa-map-marker"></i>  Endereço:</h4>
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
                                      <i class="fa fa-wrench"></i>      SERVIÇOS
                                          </header>

<div class="col-lg-12">
    <label for="">&nbsp</label>
</div>

  <form id="formServicos" action="<?php echo base_url() ?>calendar/adicionarserv" method="post">
<div class="col-lg-3">
                                <div class="form-group">
                      						<label for="serv" class="control-label">Serviços</label>

                                  <input type="text" class="form-control" name="servico" id="servico" placeholder="Digite o nome do serviço" required/>

                                  <input type="hidden" name="idservico" id="idservico" value=""/>



                                    <input type="hidden" name="idagenda" id="idagenda" value="<?php echo $agenda['idagenda'] ;?>" />

                                  <input type="hidden" name="valorserv" id="valorserv" />
                                  <input type="hidden" name="comissao" id="comissao" />
                                  <input type="hidden" name="nomeservico" id="nomeservico" />

                      					</div>
                              </div>
                              <div class="col-md-2">
                              <div class="form-group">
                                <label class="control-label">Data</label>

                                  <input class="form-control" id="datepicker"   type="text" name="datepicker"  required/>

                              </div>
                            </div>
                            <div class="col-md-1">
                            <div class="form-group">
                              <label class="control-label">Horario</label>

                                <input class="form-control" id="timepicker"   type="text" name="timepicker" required />

                            </div>
                          </div>

                            <div class="col-md-2">
                              <div class="form-group">

                                    <label>Atendente

                                      <select name="atendente" class="form-control" required>
                                        <option value="">Selecione um atendente</option>
                                        <?php
                                        foreach($all_atendentes as $atendente)
                                        {
                                          $selected = ($atendente['idatendente'] == $this->input->post('idatendente')) ? ' selected="selected"' : "";

                                          echo '<option   value="'.$atendente['idatendente'].'" '.$selected.'>'.$atendente['nome'].'</option>';
                                        }
                                        ?>
                                      </select></label>


                              </div>
                          </div>

  <div class="col-md-2">
<label for="">&nbsp</label>
<div class="col-lg-4">
  <label for="">&nbsp</label>
<input type="submit" class="btn btn-success" name="servico" value="INSERIR" />
</div>
</div>


  </form>

              <section class="panel">


                <?php  foreach ($servicos as $s) {

                  if($s->tiposerv==2) { ?>
                  <div class="row">
                  <div class="col-lg-7">
                  <div class="alert alert-success fade in">
                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                  <strong>ATENÇÃO</strong> Marque como <strong>"SIM"</strong> o serviço executado e confirme clicando em <strong>"CONFIRMAR SERVIÇOS"</strong>
                </div>
              </div>
            </div>


              <?php  }}?>
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



<form id="form"  action="<?php echo base_url() ?>calendar/confirma" method="post">

                                                        <?php
                                                        $i=0;
                            $totalserv = 0;
                            foreach ($servicos as $s) {
                                $totalserv +=$s->valorservico; ?>




                            <?php   echo '<tr>'; ?>


                              <input type="hidden" name="start[]" value="<?php echo $agenda['start'] ;?>" />
                                                           <input type="hidden" name="hora[]" value="<?php echo $agenda['hora'] ;?>" />
                              <input type="hidden" name="end[]" value="<?php echo $agenda['end'] ;?>" />
                              <input type="hidden" name="prof[]" value="<?php echo $s->idatendente ;?>" />
<input type="hidden" name="databr[]" value="<?php echo $agenda['data']; ?>"/>
                            <input type="hidden" name="iditem[]" value="<?php echo $s->iditensagenda; ?>"/>
                            <input type="hidden" name="nomeatendente[]" value="<?php echo $s->nomeatendente; ?>"/>

                            <input type="hidden" name="comissao[]" value="<?php echo $s->comissao ;?>" />




<?php if($s->tiposerv!=2){ ?>
                                                          <td style="text-align: center">


<input <?php if (isset($s->status)) {
if ($s->status == '2') {
echo 'checked';
}
}?> type="checkbox" name="status[]" value="2"><label>  <label for="">&nbsp</label> Realizado</label></input>


                                                            </td>

                                                          <?php } else {?>
                                                            <td style="text-align: center">PACOTE</td>
                                                            <input  type="hidden" name="status[]" value="">
                                                        <?php  } ?>
                                                <?php if($s->tiposerv!=2){ ?>
                                                            <td>
                                                              <select name="atendente" class="form-control" >
                                                                                   <option value="">Selecione um atendente</option>
                                                                                   <?php
                                                                                   foreach($all_atendentes as $atendente)
                                                                                   {
                                                                                     $selected = ($atendente['idatendente'] == $s->idatendente) ? ' selected="selected"' : "";

                                                                                     echo '<option   value="'.$atendente['idatendente'].'" '.$selected.'>'.$atendente['nome'].'</option>';
                                                                                   }
                                                                                   ?>
                                                                                 </select>

                                                            </td>
                                                          <?php } else {?>
                                                            <td style="text-align: center">PACOTE</td>
                                                        <?php  }


                                                            echo '<td style="text-align: center">'.$s->nomeservico.'</td>';

                                                            if($s->tiposerv!=0){
                                                            echo '<td style="text-align: center"><strong>R$ '.$s->valorservico.',00</strong></td>';}
else{
                                                                  echo '<td style="text-align: center"><strong>###</strong></td>';}
                                                             ?>

<?php   if($s->tiposerv!=0){ ?>
                                                  <td><span idAcao="<?php echo $s->iditensagenda ;?>" title="Excluir" class="btn btn-danger"><i class="icon-remove icon-white">EXCLUIR</i></span></td>
<?php }else{?>
  <td></td>
<?php } ?>








                                  <?php    $i++;                echo '</tr>';  }?>



<td style="text-align: center"><input type="submit" class="btn btn-success" name="servico" value="CONFIRMAR SERVIÇO" /></td>
</form>
                                                      </tbody>

                                                    </table>

                                                  </div>



                                                    </section>

</div>


<div class="row">
                                      <header class="panel-heading">
                                      <i class="fa fa-shopping-cart"></i> PRODUTOS
                                          </header>
                                          <div class="col-lg-12">
                                              <label for="">&nbsp</label>
                                          </div>

                                          <div class="box-body">
  <form id="formProdutos" action="<?php echo base_url() ?>calendar/addproduto" method="post">
                                            <div class="col-lg-7">
                                            <div class="form-group">
                                              <label for="idservico" class="control-label">Inserir produtos</label>

                                              <input type="text" class="form-control" name="produto" id="produto" placeholder="Digite o nome do produto" />

                                              <input type="hidden" name="idproduto" id="idproduto" value=""/>





                                              <input type="hidden" name="precovenda" id="precovenda" />
                                              <input type="hidden" name="nomeproduto" id="nomeproduto" />


                                            </div>
                                          </div>

                                          <div class="col-lg-1">
                                            <div class="form-group">
                                              <label for="idservico" class="control-label">Qtdd </label>
                                              <input type="text" class="form-control" name="quantidade" id="quantidade"/>
                                            </div>
                                          </div>

                                          <label for="">&nbsp</label>
                                          <div class="col-lg-4">
                                            <label for="">&nbsp</label>
                                          <input type="submit" class="btn btn-success" name="inserirservico" value="INSERIR PRODUTO" />
                                          </div>
</form>

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
    <div id="divFinanceiro">
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

<div class="col-lg-3">
  <?php if ($agenda['status'] == 1) {
                                ?>
                                              <a href="#modal-faturar" id="btn-faturar" role="button" data-toggle="modal" class="btn btn-success"><i class="fa fa-money"></i> RECEBER</a>
                                                <a href="#modal-fiado" id="btn-fiado" role="button" data-toggle="modal" class="btn btn-warning"><i class="fa fa-exclamation-circle"></i> FIADO</a>
                                          <?php
                            } ?>


</div>
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


              <input type="hidden" value="#00FF7F" id="cor"name="cor"/>

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

                                <button type="submit" class="btn btn-success">FATURAR</button>
                                </div>
  <?php echo form_close(); ?>
                              </div>


                            </div>
                          </div>




                          <div class="modal fade" id="modal-fiado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">MARCAR FIADO</h4>
                                              </div>
                                              <div class="modal-body">

  <?php echo form_open('contasareceber/fiado') ?>
                                                <div class="box-body">

                                                      <div class="row">

                                                        <div class="col-lg-5">
                                                      <h4>  Cliente: </strong><?php echo $cliente['nome'] ;?> <?php echo  $cliente['sobrenome']; ?></h4>
                                                      </div>
                                                      <div class="col-lg-4">
  <input type="hidden" name="valor"  value="<?php echo $totalserv ?>"/>
                                                        <h4>Data: <?php echo $agenda['data'] ;?></h4>
                                                      </div>
                                                      <input type="hidden" name="idagendamento" id="idagendamento" value="<?php echo $agenda['idagenda'] ;?>" />




                                                          <input type="hidden" value="#00FF7F" id="cor"name="cor"/>

                                                      <input type="hidden" name="itemstatus" id="itemstatus" value="2" />

  <input type="hidden" name="descricao" value="Venda - <?php echo $agenda['idagenda'] ;?> / Cliente:<?php echo $cliente['nome'] ;?> <?php echo  $cliente['sobrenome']; ?>"/>
                                                      <div class="col-lg-4">
                                                          Data vencimento: <input type="text" class="form-control" id="data" name="data"/>
                                                      </div>

                                                      <div class="col-lg-4">
                                                          <h4>TOTAL: <strong> R$<?php echo $totalserv ?>,00</strong></h4>
                                                      </div>
                                                      </div>
                                                </div>
                                              </div>

                                              <div class="modal-footer">

                                              <button type="submit" class="btn btn-success">MARCAR FIADO</button>
                                              </div>
                <?php echo form_close(); ?>
                                            </div>
                                          </div>
                                        </div>




                            <!-- ck editor -->

                            <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
                            <script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.4.min.js"></script>

                          <script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
                            <script src="<?php echo base_url()?>assets/js/validate.js"></script>



                              <script src="<?php echo base_url()?>assets/js/maskmoney.js"></script>
                              <script src="<?php echo base_url()?>assets/js/jquery.hotkeys.js"></script>
                              <script src="<?php echo base_url()?>assets/js/bootstrap-wysiwyg.js"></script>

                              <script src="<?php echo base_url()?>assets/js/moment.js"></script>
                              <script src="<?php echo base_url()?>assets/js/bootstrap-colorpicker.js"></script>
                              <script src="<?php echo base_url()?>assets/js/daterangepicker.js"></script>
                              <script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
                              <script src="<?php echo base_url()?>assets/js/jquery.timepicker.min.js"></script>



<script type="text/javascript">


  $( "#datepicker" ).datepicker({ format: 'dd/mm/yyyy' });

  $( "#data" ).datepicker({ format: 'dd/mm/yyyy' });

$( "#timepicker" ).timepicker();

$(document).on('click', 'span', function(event) {
            var $idserv = $(this).attr('idAcao');
            if(($idserv % 1) == 0){

                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>calendar/removeservicoagenda",
                  data: "idserv="+$idserv,
                  dataType: 'json',
                  success: function(data)
                  {
                    if(data.result == true){

                        $("#divServicos").load("<?php echo current_url();?> #divServicos" );
                          $("#divFinanceiro").load("<?php echo current_url();?> #divFinanceiro" );

}
else{

alert('Ocorreu um erro ao tentar excluir serviço.');
}
                  }
                  });
                  return false;
            }

       });

       $("#form").validate({

         rules:{
            atendente: {required:true}
         },
         messages:{
            atendente: {required: 'Insira um serviço'}
         },

      submitHandler: function( form ){
      var dados = $( form ).serialize();
$.ajax({
  type: "POST",
  url:"<?php echo base_url();?>calendar/confirma",
  data:dados,
  dataType:'json',
  success:function(data)
  {
    if(data.result == true){

        $('#call-modal').trigger('click');
    }
    else{
        $('#falseservice').trigger('click');
    }
  }

});
return false;
  }

});



       $("#formpacote").validate({

         rules:{
            nomeservico: {required:true}
         },
         messages:{
            nomeservico: {required: 'Insira um serviço'}
         },

submitHandler: function( form ){
      var dados = $( form ).serialize();


     $.ajax({
       type: "POST",
       url: "<?php echo base_url();?>calendar/adicionarserv",
       data: dados,
       dataType: 'json',
       success: function(data)
       {
         if(data.result == true){
             $( "#divServicos" ).load("<?php echo current_url();?> #divServicos" );
             $( "#divFinanceiro" ).load("<?php echo current_url();?> #divFinanceiro" );


         }
         else{
             alert('Ocorreu um erro ao tentar adicionar serviço.');
         }
       }
       });

       return false;
     }

});


                  $("#formServicos").validate({

                    rules:{
                       nomeservico: {required:true}
                    },
                    messages:{
                       nomeservico: {required: 'Insira um serviço'}
                    },

          submitHandler: function( form ){
                 var dados = $( form ).serialize();


                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>calendar/adicionarserv",
                  data: dados,
                  dataType: 'json',
                  success: function(data)
                  {
                    if(data.result == true){
                        $( "#divServicos" ).load("<?php echo current_url();?> #divServicos" );
                        $( "#divFinanceiro" ).load("<?php echo current_url();?> #divFinanceiro" );
                        $('#servico').val('').focus();

                    }
                    else{
                        alert('Ocorreu um erro ao tentar adicionar serviço.');
                    }
                  }
                  });

                  return false;
                }

       });


       $("#formProdutos").validate({
rules:{
   nomeproduto: {required:true}
},
messages:{
   nomeproduto: {required: 'Insira um produto'}
},
submitHandler: function( form ){
       var dados = $( form ).serialize();


      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>calendar/addproduto",
        data: dados,
        dataType: 'json',
        success: function(data)
        {
          if(data.result == true){
              $( "#divProdutos" ).load("<?php echo current_url();?> #divProdutos" );
                $('#inputproduto').val('').focus();
                $('#quantidade').val('');

          }
          else{
              alert('Ocorreu um erro ao tentar adicionar produto.');
          }
        }
        });

        return false;
      }

});


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

$("#produto").autocomplete({

    source: "<?php echo base_url(); ?>calendar/autoCompleteProduto",

    minLength: 2,

    select: function(event, ui) {



        $("#idproduto").val(ui.item.idproduto);

        $("#nomeproduto").val(ui.item.nome);
          $("#precovenda").val(ui.item.precovenda);









    }

});

                </script>



                <a href="#notification" id="call-modal" role="button" class="btn" data-toggle="modal" style="display: none ">notification</a>
                  <a href="#servicefalse" id="falseservice" role="button" class="btn" data-toggle="modal" style="display: none ">servicefalse</a>


                <div class="modal fade" id="notification">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              UP Unhas
                            </div>
                            <div class="modal-body">
                                <h3 style="text-align: center">Serviço confirmado com sucesso!</h3>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Fechar</button>

                            </div>
                        </div>
                        </div>
                      </div>

                      <div class="modal fade" id="servicefalse">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    UP Unhas
                                  </div>
                                  <div class="modal-body">
                                      <h3 style="text-align: center">Nenhum serviço confirmado, marque o serviço realizado!</h3>
                                  </div>
                                  <div class="modal-footer">
                                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Fechar</button>

                                  </div>
                              </div>
                              </div>
                            </div>
