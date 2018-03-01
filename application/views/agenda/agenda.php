
<section id="main-content">
  <section class="wrapper">

 <!--<link rel="stylesheet" href="https://jquery.ui.timepicker.css?v=0.3.3" type="text/css" />
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!--    <script src="https://fgelinas.com/code/timepicker/jquery.ui.timepicker.js?v=0.3.3"></script>-->










    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"></h3>



        <div id='calendar'></div>


        <script>

        $(document).on('show.bs.modal', '.modal', function (event) {
           var zIndex = 1040 + (10 * $('.modal:visible').length);
           $(this).css('z-index', zIndex);
           setTimeout(function() {
               $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
           }, 0);
       });
        </script>




        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="cadastrar" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Agendar</h4>
              </div>
              <div class="modal-body">

          <!--    <?php echo form_open('calendar/add'); ?> -->

          <form action="" method="post" id="form_prepare">
  <div class="col-lg-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Data</label>
                <input type="text" class="form-control" value="" name="start" id="start" >
                <input type="hidden" class="form-control" value="" name="dataInicial" id="dataInicial" >
              </div>
              </div>

<div class="col-lg-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Hora</label>
                    <input type="text" class="form-control" value="" name="hora" id="hora" >
                    <input type="hidden" class="form-control" value="" name="hora" id="hora" >
                    <input type="hidden" class="form-control" value="1" name="status" id="status" >
                    <input type="hidden" class="form-control" value="" name="end" id="end" >
                    <input type="hidden" class="form-control" value="#809fff" name="cor" id="cor" >
                    <input type="hidden" value="ABERTO" name="status">
                  </div>
</div>

<div class="col-md-5">
  <label for="atendente" class="control-label"><span class="text-danger">*</span>Atendente</label>
  <div class="form-group">
    <select name="atendente" class="form-control">
      <option value="">Selecione um atendente</option>
      <?php
      foreach($all_atendentes as $atendente)
      {
        $selected = ($atendente['idatendente'] == $this->input->post('idatendente')) ? ' selected="selected"' : "";

        echo '<option value="'.$atendente['idatendente'].'" '.$selected.'>'.$atendente['nome'].'</option>';
      }
      ?>
    </select>
    <span class="text-danger"><?php echo form_error('idatendente');?></span>
  </div>
</div>



<div class="col-lg-8">
    <div class="form-group">
    <label for="idcliente" class="control-label"><span class="text-danger">*</span>Cliente</label>


    <input type="text" class="form-control" name="cliente" id="cliente" placeholder="Digite o nome do cliente" />

    <input type="hidden" name="idcliente" id="idcliente" />
    <input type="hidden" name="nomecli" id="nomecli" />


      <span class="text-danger"><?php echo form_error('idcliente');?></span>
    </div>
  </div>

  <div class="col-lg-4"><br>
  <a data-toggle="modal" href="#myModal3" class="btn btn-primary">Novo Cliente</a>

  </div>
<!--<?php echo form_close(); ?>-->

<div class="row">

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

<div class="col-lg-4">
<label><input type="submit" class="btn btn-success" name="ok" value="ADICIONAR SERVIÇO" /></label>
</div>
  </form>
                          </div>







                                <table id="item" class="table table-bordered">
                                          <thead>
                                            <tr>
                                              <td>Serviço</td>

                                            <td>Data</td>
                                            <td>Hora</td>
                                            <td>Ações</td>
                                            </tr>
                                          </thead>
                                          <tbody>

                                          </tbody>
                                        </table>




</div>


<div class="modal-footer">

  <form action="<?php echo base_url();?>calendar/add" method="post" id="form_insert">
  			<fieldset style="display: none;"></fieldset>
  			<label><input type="submit" class="btn btn-success" name="cadastrar" value="AGENDAR" /></label>
  		</form>

  <!--<button  onclick="Add()"class="btn btn-success"><i class="fa fa-clock-o"> AGENDAR</button> -->


</div>

              </div>
            </div>
          </div>
        </div>




        <div class="modal fade" id="myModal3">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        	<h4 class="modal-title">Cadastrar cliente</h4>
                    </div>
                    <div class="container"></div>
                    <div class="modal-body">



  <form id="formClientes" action="<?php echo base_url() ?>clientes/addcliente" method="post">



                              <div class="col-lg-6">
                                <div class="form-group">
                          <label for="nome">Nome
                          <input type="text" class="form-control" name="nome" value="<?php echo $this->input->post('nome'); ?>" id="nome" ></label>
                        </div>
                      </div>

          <div class="col-lg-6">
            <div class="form-group">
                          <label for="sobrenome">Sobrenome
                          <input type="text" class="form-control" name="sobrenome" value="<?php echo $this->input->post('sobrenome'); ?>" id="sobrenome" ></label>
                        </div>
                          </div>


          <div class="col-lg-6">

                        <div class="form-group">
                          <label for="telefone">Telefone
                          <input type="text" class="form-control" name="telefone"value="<?php echo $this->input->post('telefone'); ?>" id="telefone" ></label>
                        </div>
          </div>

                        <div class="col-lg-6">
                          <label for="status" class="control-label">Status
                          <div class="form-group">
                            <select name="status" class="form-control">
                              <option value="">select</option>
                              <?php
                              $status_values = array(
                                '1'=>'ATIVO',
                                '2'=>'INATIVO',
                              );

                              foreach($status_values as $value => $display_text)
                              {
                                $selected = ($value == $this->input->post('status')) ? ' selected="selected"' : "";

                                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                              }
                              ?>
                            </select></label>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <label for="rua" class="control-label">Rua
                          <div class="form-group">
                            <input type="text" name="rua" value="<?php echo $this->input->post('rua'); ?>" class="form-control" id="rua" /></label>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <label for="numero" class="control-label">Numero
                          <div class="form-group">
                            <input type="text" name="numero" value="<?php echo $this->input->post('numero'); ?>" class="form-control" id="numero" /></label>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <label for="bairro" class="control-label">Bairro
                          <div class="form-group">
                            <input type="text" name="bairro" value="<?php echo $this->input->post('bairro'); ?>" class="form-control" id="bairro" /></label>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <label for="cidade" class="control-label">Cidade
                          <div class="form-group">
                            <input type="text" name="cidade" value="<?php echo $this->input->post('cidade'); ?>" class="form-control" id="cidade" /></label>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                    </div>
                    <div class="modal-footer">
                      <a href="#" data-dismiss="modal" class="btn btn-danger">Fechar</a>
                    </div>
                </div>
            </div>
        </div>




<div id='travar' class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Travar Horário</h3>
    </div>
    <div class="modal-body">
      <div class="box-body">
        <div class="row clearfix">
      <?php echo form_open('calendar/addtrava'); ?>


      <div class="col-md-5">
        <label class="control-label"><span class="text-danger">*</span>Atendente</label>
        <div class="form-group">
          <select name="atendente" class="form-control">
            <option value="">Selecione um atendente</option>
            <?php
            foreach($all_atendentes as $atendente)
            {
              $selected = ($atendente['idatendente'] == $this->input->post('idatendente')) ? ' selected="selected"' : "";

              echo '<option value="'.$atendente['idatendente'].'" '.$selected.'>'.$atendente['nome'].'</option>';
            }
            ?>
          </select>
          <span class="text-danger"><?php echo form_error('idatendente');?></span>
        </div>
      </div>

                  <div class="col-md-6">

                        <label for="dataInicial" class="control-label">Data<span class="required">*</span></label>
  <div class="form-group">

                        <input class="form-control" id="datepicker"   type="text" name="datepicker"  />
                        <input type="hidden" value="#696969" name="cor"/>

                        <input type="hidden" id="nomeservico" value="Horario não disponivel" name="nomeservico" />
                    </div>
</div>




                      <div class="col-md-6">
                      <label for="inicio" class="control-label">Inicio
<div class="form-group">
                        <select name="hora"  class="form-control">
<option value="08:00">8:00</option>
<option value="08:30">8:30</option>
<option value="09:00">9:00</option>
<option value="09:30">9:30</option>
<option value="10:00">10:00</option>
<option value="10:30">10:30</option>
<option value="11:00">11:00</option>
<option value="11:30">11:30</option>
<option value="12:00">12:00</option>
<option value="12:30">12:30</option>
<option value="13:00">13:00</option>
<option value="13:30">13:30</option>
<option value="14:00">14:00</option>
<option value="14:30">14:30</option>
<option value="15:00">15:00</option>
<option value="15:30">15:30</option>
<option value="15:30">16:00</option>
<option value="16:30">16:30</option>
<option value="17:00">17:00</option>
<option value="17:30">17:30</option>
<option value="18:00">18:00</option>
<option value="18:30">18:30</option>
<option value="19:00">19:00</option>

</select>




</div>
</div>
  <div class="col-md-6">
  <label for="fim" class="control-label">Fim
  <div class="form-group">
                  <select name="end"  class="form-control">
                  <option value="08:00">8:00</option>
                  <option value="08:30">8:30</option>
                  <option value="09:00">9:00</option>
                  <option value="09:30">9:30</option>
                  <option value="10:00">10:00</option>
                  <option value="10:30">10:30</option>
                  <option value="11:00">11:00</option>
                  <option value="11:30">11:30</option>
                  <option value="12:00">12:00</option>
                  <option value="12:30">12:30</option>
                  <option value="13:00">13:00</option>
                  <option value="13:30">13:30</option>
                  <option value="14:00">14:00</option>
                  <option value="14:30">14:30</option>
                  <option value="15:00">15:00</option>
                  <option value="15:30">15:30</option>
                  <option value="15:30">16:00</option>
                  <option value="16:30">16:30</option>
                  <option value="17:00">17:00</option>
                  <option value="17:30">17:30</option>
                  <option value="18:00">18:00</option>
                  <option value="18:30">18:30</option>
                  <option value="19:00">19:00</option>

                  </select>

<input type="hidden" name="status" value="0"/>
</div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success"><i class="fa fa-clock-o"> TRAVAR HORARIO</i></button>

<?php echo form_close(); ?>
</div>
</div>
    </div>
</div>
    </div>

  </div>
</div>



    <div id='modal' class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Agendamento</h3>
        </div>


        <div class="modal-body">

          <?php echo form_open('calendar/delete'); ?>

              <h2>Data: <p id="start"></h2> </p><input type="hidden" id="id" name="id" value=""/>
              <h2>Inicio:<p id="hora"></p>Termino:<p id="end"></p><h2>

               <h3><p id="eventInfo"></p><br></h3>
              <p id="id" name="id"></p>










        </div>
        <div class="modal-footer">

            <button type="submit" class="btn btn-danger"><i class="fa fa-clock-o"> EXCLUIR AGENDAMENTO</i></button>
          <!--  <a data-toggle="modal" id="btn-faturar" class="btn btn-success"><i class="fa fa-money"> FATURAR </i></a> -->
              <?php echo form_close(); ?>



        </div>
    </div>
        </div></div>

        <div class="modal fade" id="myModal4">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      Receber
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">

                      <?php echo form_open('contasreceber/add'); ?>
                      <div class="box-body">
                        <div class="row clearfix">
                    <div class="col-md-6">
                      <label for="descricao" class="control-label">Descricao</label>
                      <div class="form-group">
                        <input type="text" name="descricao" value="<?php echo $this->input->post('descricao'); ?>" class="form-control" id="descricao" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="numero" class="control-label">Numero</label>
                      <div class="form-group">
                        <input type="text" name="numero" value="<?php echo $this->input->post('numero'); ?>" class="form-control" id="numero" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="datavencimento" class="control-label">Datavencimento</label>
                      <div class="form-group">
                        <input type="text" name="datavencimento" value="<?php echo $this->input->post('datavencimento'); ?>" class="has-datepicker form-control" id="datepicker1" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="valor" class="control-label">Valor</label>
                      <div class="form-group">
                        <input type="text" name="valor" value="<?php echo $this->input->post('valor'); ?>" class="form-control" id="valor" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="datapagamento" class="control-label">Data Pagamento</label>
                      <div class="form-group">
                        <input type="text" name="datapagamento" value="<?php echo $this->input->post('datapagamento'); ?>" class="has-datepicker form-control" id="datepicker" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="formarecebimento" class="control-label">Forma Recebimento</label>
                      <div class="form-group">
                        <input type="text" name="formarecebimento" value="<?php echo $this->input->post('formarecebimento'); ?>" class="form-control" id="formarecebimento" />
                      </div>
                    </div>
                  </div>
                </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-success">
                          <i class="fa fa-check"></i> RECEBER
                        </button>
                      </div>
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
              </div>




      </div>


    </div>




<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.1.5.js"></script>


    <script>
    $( function() {
      $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });

      RemoveTableRow = function(handler) {
        var tr = $(handler).closest('tr');

        tr.fadeOut(400, function(){
          tr.remove();
        });

        return false;
      };

      $('#form_prepare').submit(function(){
        var $this = $( this );

          var hora= $this.find("input[name='hora']").val();
          var start = $this.find("input[name='dataInicial']").val();
          var nomeservico = $this.find("input[name='nomeservico']").val();
            var nome = $this.find("input[name='nome']").val();
          var valorserv = $this.find("input[name='valorserv']").val();
            var comissao = $this.find("input[name='comissao']").val();
            var idcliente = $this.find("input[name='idcliente']").val();
              var idservico = $this.find("input[name='idservico']").val();
            var end = $this.find("input[name='end']").val();
            var atendente = $this.find("select[name='atendente']").val();
            var status = $this.find("input[name='status']").val();
            var cor = $this.find("input[name='cor']").val();






        var tr = '<tr>'+
          '<td>'+nomeservico+'</td>'+
          '<td>'+start+'</td>'+
          '<td>'+hora+'</td>'+

        '<td>  <button class="btn btn-danger" onclick="RemoveTableRow(this)" type="button">REMOVER</button> </td>'
          '</tr>'
        $('#item').find('tbody').append( tr );


        var hiddens = '<input type="hidden" name="nomeservico[]" value="'+nomeservico+'" />'+
        '<input type="hidden" name="valorserv[]" value="'+valorserv+'" />'+
        '<input type="hidden" name="comissao[]" value="'+comissao+'" />'+
        '<input type="hidden" name="idservico[]" value="'+idservico+'" />'+
        '<input type="hidden" name="idcliente[]" value="'+idcliente+'" />'+
        '<input type="hidden" name="nome[]" value="'+nome+'" />'+
			'<input type="hidden" name="hora[]" value="'+hora+'" />'+
      '<input type="hidden" name="atendente[]" value="'+atendente+'" />'+
      '<input type="hidden" name="end[]" value="'+end+'" />'+
      '<input type="hidden" name="status[]" value="'+status+'" />'+
      '<input type="hidden" name="cor[]" value="'+cor+'" />'+
			'<input type="hidden" name="dataInicial[]" value="'+start+'" />';

		$('#form_insert').find('fieldset').append( hiddens );

        return false;
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

      $("#cliente").autocomplete({

          source: "<?php echo base_url(); ?>calendar/autoCompleteCliente",

          minLength: 2,

          select: function(event, ui) {



              $("#idcliente").val(ui.item.idcliente);
              $("#nome").val(ui.item.nome);





          }

      });

      function Add(){
          alert('testando função');
      };




      $(document).on('click', '#btn-faturar', function(form) {
        var tipo = parseInt($("#id").val());

          alert(tipo);


          $.ajax({

              type: "POST",

              url: "<?php echo base_url();?>calendar/faturar",

              data: tipo,

              dataType: 'json',

              success: function(data) {

                  if (data.result == true) {






                  alert('Deu Certo');



                    //  $("#divServicos").load(" #divServicos");

                   //   $("#servico").val('').focus();

                  } else {

                      alert('Erro ao Faturar');

                  }

              }

          });


      });


    });
    </script>
</section>
</section>
