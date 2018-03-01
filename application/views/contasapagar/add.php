<section id="main-content">
  <section class="wrapper">


  <link  rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" />
         <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

           <script src="https://fgelinas.com/code/timepicker/jquery.ui.timepicker.js?v=0.3.3"></script>

    <script type="text/javascript">
    function formatarMoeda() {
    var elemento = document.getElementById('valor');
    var valor = elemento.value;

    valor = valor + '';
    valor = parseInt(valor.replace(/[\D]+/g,''));
    valor = valor + '';
    valor = valor.replace(/([0-9]{2})$/g, ",$1");

    if (valor.length > 6) {
    valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    }

    elemento.value = valor;
    }

    </script>

<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">ADICIONAR NOVO</h3>
            </div>
            <?php echo form_open('contasapagar/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">

					<div class="col-md-6">
						<label for="descricao" class="control-label"><span class="text-danger">*</span>Descrição</label>
						<div class="form-group">
							<input type="text" name="descricao" value="<?php echo $this->input->post('descricao'); ?>" class="form-control" id="descricao" />
							<span class="text-danger"><?php echo form_error('descricao');?></span>
						</div>
					</div>
					<div class="col-md-2">
						<label for="numero" class="control-label">Numero</label>
						<div class="form-group">
							<input type="text" name="numero" value="<?php echo $this->input->post('numero'); ?>" class="form-control" id="numero" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="valor" class="control-label"><span class="text-danger">*</span>Valor</label>
						<div class="form-group">
							<input type="text" name="valor" value="<?php echo $this->input->post('valor'); ?>" onkeyup="formatarMoeda();" class="form-control" id="valor" />
							<span class="text-danger"><?php echo form_error('valor');?></span>
						</div>
					</div>
					<div class="col-md-2">
						<label for="datavencimento" class="control-label"><span class="text-danger">*</span>Data vencimento</label>
						<div class="form-group">
							<input type="text" name="datavencimento" value="<?php echo $this->input->post('datavencimento'); ?>" class="form-control" id="datavencimento" />
							<span class="text-danger"><?php echo form_error('datavencimento');?></span>
						</div>
					</div>

          <div class="col-md-7">
						<label for="obs" class="control-label">Observação</label>
						<div class="form-group">
							<input type="text" name="obs" value="<?php echo $this->input->post('obs'); ?>" class="form-control" id="obs" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="datapagamento" class="control-label">Data pagamento</label>
						<div class="form-group">
							<input type="text" name="datapagamento" value="<?php echo $this->input->post('datapagamento'); ?>" class="form-control" id="datapagamento" />
						</div>
					</div>


            <div class="col-md-2">
              <label for="formarecebimento" class="control-label">Forma Pagamento</label>

              <div class="form-group">
              <select name="formarecebimento" class="form-control">
                <option value="">Selecione    </option>
                  <option value="DINHEIRO"> DINHEIRO</option>
                  <option value="CARTAO DE CREDITO"> CARTÃO DE CRÉDITO</option>
                  <option value="CARTAO DE DEBITO"> CARTÃO DE DÉBITO</option>
                  <option value="CHEQUE"> CHEQUE</option>
              </select>
              </div>
            </div>


				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> SALVAR
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>

<script>
$( function() {
  $( "#datavencimento" ).datepicker({ dateFormat: 'dd/mm/yy' });

    $( "#datapagamento" ).datepicker({ dateFormat: 'dd/mm/yy' });

});
</script>
