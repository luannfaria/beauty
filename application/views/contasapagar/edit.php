<section id="main-content">
  <section class="wrapper">


  <link  rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" />
         <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

           <script src="https://fgelinas.com/code/timepicker/jquery.ui.timepicker.js?v=0.3.3"></script>


<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Contas a pagar Editar/PAGAR</h3>
            </div>
			<?php echo form_open('contasapagar/edit/'.$contasapagar['idcontasapagar']); ?>
			<div class="box-body">
				<div class="row clearfix">

					<div class="col-md-6">
						<label for="descricao" class="control-label"><span class="text-danger">*</span>Descrição</label>
						<div class="form-group">
							<input type="text" name="descricao" value="<?php echo ($this->input->post('descricao') ? $this->input->post('descricao') : $contasapagar['descricao']); ?>" class="form-control" id="descricao" />
							<span class="text-danger"><?php echo form_error('descricao');?></span>
						</div>
					</div>
					<div class="col-md-2">
						<label for="numero" class="control-label">Numero</label>
						<div class="form-group">
							<input type="text" name="numero" value="<?php echo ($this->input->post('numero') ? $this->input->post('numero') : $contasapagar['numero']); ?>" class="form-control" id="numero" />
						</div>
					</div>
          <div class="col-md-2">
						<label for="datavencimento" class="control-label"><span class="text-danger">*</span>Data vencimento</label>
						<div class="form-group">
							<input type="text" name="datavencimento" value="<?php echo ($this->input->post('datavencimento') ? $this->input->post('datavencimento') : $contasapagar['datavencimento']); ?>" class="has-datepicker form-control" id="datavencimento" />
							<span class="text-danger"><?php echo form_error('datavencimento');?></span>
						</div>
					</div>
					<div class="col-md-2">
						<label for="valor" class="control-label"><span class="text-danger">*</span>Valor</label>
						<div class="form-group">
							<input type="text" name="valor" value="<?php echo ($this->input->post('valor') ? $this->input->post('valor') : $contasapagar['valor']); ?>" class="form-control" id="valor" />
							<span class="text-danger"><?php echo form_error('valor');?></span>
						</div>
					</div>

          <div class="col-md-6">
						<label for="obs" class="control-label">Obs</label>
						<div class="form-group">
							<input type="text" name="obs" value="<?php echo ($this->input->post('obs') ? $this->input->post('obs') : $contasapagar['obs']); ?>" class="form-control" id="obs" />
						</div>
					</div>

					<div class="col-md-2">
						<label for="datapagamento" class="control-label">Data pagamento</label>
						<div class="form-group">
							<input type="text" name="datapagamento" value="<?php echo ($this->input->post('datapagamento') ? $this->input->post('datapagamento') : $contasapagar['datapagamento']); ?>" class="has-datepicker form-control" id="datapagamento" />
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
