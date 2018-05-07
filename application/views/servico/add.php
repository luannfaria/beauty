<section id="main-content">
  <section class="wrapper">

<div class="row">
    <div class="col-md-12">
      <section class="panel">
        <header class="panel-heading">
          <i class="fa fa-wrench"></i>Adicionar serviço
        </header>
      	<div class="panel-body">

            <?php echo form_open('servico/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">

					<div class="col-md-4">
						<label for="nomeservico" class="control-label"><span class="text-danger">*</span>Nome do serviço</label>
						<div class="form-group">
							<input type="text" name="nomeservico" value="<?php echo $this->input->post('nomeservico'); ?>" class="form-control" data-toggle="tooltip" title="Hooray!" id="nomeservico" />
							<span class="text-danger"><?php echo form_error('nomeservico');?></span>
						</div>
					</div>
					<div class="col-md-2">
						<label for="valorserv" class="control-label"><span class="text-danger">*</span>Valor de venda</label>
						<div class="form-group">
							<input type="text" name="valorserv" value="<?php echo $this->input->post('valorserv'); ?>" class="form-control"  id="valorserv" />
							<span class="text-danger"><?php echo form_error('valorserv');?></span>
						</div>
					</div>

					<div class="col-md-2">
						<label for="comissao" class="control-label">Comissão</label>
						<div class="form-group">
							<input type="text" name="comissao" value="<?php echo $this->input->post('comissao'); ?>" class="form-control" id="comissao" />
						</div>
					</div>

          <div class="col-md-3">
            <label for="idcategoria" class="control-label"><span class="text-danger">*</span>Categorias</label>
            <div class="form-group">
              <select name="idcategoria" class="form-control m-bot15">
                <option value="">Selecione uma categoria</option>
                <?php
                foreach($all_categoria_prod_servs as $categoria_prod_serv)
                {
                  $selected = ($categoria_prod_serv['idcategoria_prod_serv'] == $this->input->post('idcategoria')) ? ' selected="selected"' : "";

                  echo '<option value="'.$categoria_prod_serv['idcategoria_prod_serv'].'" '.$selected.'>'.$categoria_prod_serv['nome'].'</option>';
                }
                ?>
              </select>
              <span class="text-danger"><?php echo form_error('idcategoria');?></span>
            </div>
          </div>


							<input type="hidden" name="status" value="1" class="form-control" id="status" />


							<input type="hidden" name="tiposervico" value="1" class="form-control" id="tiposervico" />

				</div>
      </div>

          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> CADASTRAR
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
</section>
    </div>
</div>





<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>

<script src="<?php echo base_url()?>assets/js/validate.js"></script>


  <script src="<?php echo base_url()?>assets/js/maskmoney.js"></script>


  <script type="text/javascript">

  $('[data-toggle="tooltip"]').tooltip();

$('#valorserv').maskMoney();
$('#comissao').maskMoney();


</script>
