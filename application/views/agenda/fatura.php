<section id="main-content">
  <section class="wrapper">


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
          Receber Atendimento
        </header>
        <div class="panel-body">
          <?php echo form_open('contasareceber/faturavenda') ?>
          <div class="box-body">
            <div class="row clearfix">
              <div class="col-md-4">
                <label for="descricao" class="control-label">Descrição</label>
                <div class="form-group">
                  <input type="text" name="descricao" value="Venda - <?php echo ($this->input->post('idagenda') ? $this->input->post('idagenda') : $itensagenda['idagenda']); ?> / Cliente: <?php echo ($this->input->post('nomecliente') ? $this->input->post('nomecliente') : $itensagenda['nomecliente']); ?> " class="form-control" id="descricao" />
                </div>
              </div>


              <div class="col-md-2">
    						<label for="numero" class="control-label">Numero</label>
    						<div class="form-group">
    							<input type="text" name="numero" value="<?php echo ($this->input->post('idagenda') ? $this->input->post('idagenda') : $itensagenda['idagenda']); ?>" class="form-control" id="numero" />

                      <input type="hidden" name="idagendamento" id="idagendamento" value="<?php echo ($this->input->post('idagenda') ? $this->input->post('idagenda') : $itensagenda['idagenda']); ?>" />
                </div>
    					</div>

              <div class="col-md-3">
    						<label for="datapagamento" class="control-label">Data Pagamento</label>
    						<div class="form-group">
    							<input type="text" name="datapagamento" value="" class="has-datepicker form-control" id="datepicker" />
    						</div>
    					</div>

              <div class="col-md-3">
    						<label for="datavencimento" class="control-label">Data Vencimento</label>
    						<div class="form-group">
    							<input type="text" name="datavencimento" value="" class="has-datepicker form-control" id="datepicker1" />
    						</div>
    					</div>
              <div class="col-md-3">
                <label for="valor" class="control-label">Valor</label>
                <div class="form-group">
                  <input type="text" name="valor"  value="<?php echo ($this->input->post('subtotal') ? $this->input->post('subtotal') : $itensagenda['subtotal']); ?>" class="form-control" id="valorservico" />
                </div>
              </div>

              <input type="hidden" name="status" value="FECHADO">

              <div class="col-md-3">
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
          <div class="box-footer">
                  <button type="submit" class="btn btn-success">
              <i class="fa fa-check"></i> RECEBER
            </button>
              </div>
          <?php echo form_close(); ?>
            </div>

        </div>
      </section>

    </div>

    <script>
    $( function() {
      $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
      $( "#datepicker1" ).datepicker({ dateFormat: 'dd/mm/yy' });

    });
    </script>
