<section id="main-content">
  <section class="wrapper">


<div class="row">
    <div class="col-md-12">
      	<section class="panel">
        <header class="panel-heading">
          <i class="fa fa-dollar"></i>Adicionar nova conta
        </header>
            
            <div class="panel-body">
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
						<label for="numero" class="control-label">Nº Documento</label>
						<div class="form-group">
							<input type="text" name="numero" value="<?php echo $this->input->post('numero'); ?>" class="form-control" id="numero" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="valor" class="control-label"><span class="text-danger">*</span>Valor</label>
						<div class="form-group">
							<input type="text" name="valor" value="<?php echo $this->input->post('valor'); ?>"  class="form-control" id="valor" />
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
        </section>
    </div>
</div>

<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="<?php echo base_url()?>assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>

<!-- jquery ui -->
<script src="<?php echo base_url()?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="<?php echo base_url()?>assets/js/validate.js"></script>


    <script src="<?php echo base_url()?>assets/js/maskmoney.js"></script>

    <script src="<?php echo base_url()?>assets/js/jquery.hotkeys.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap-wysiwyg.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap-wysiwyg-custom.js"></script>
    <script src="<?php echo base_url()?>assets/js/moment.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap-colorpicker.js"></script>
    <script src="<?php echo base_url()?>assets/js/daterangepicker.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">

    $('#valor').maskMoney();
    $( "#datavencimento" ).datepicker({ dateFormat: 'DD/MM/YY' });
    </script>
