<section id="main-content">
  <section class="wrapper">
<div class="row">
    <div class="col-md-12">
      <section class="panel">
        <header class="panel-heading">
          <i class="fa fa-shopping-cart"></i>Adicionar produto
        </header>
            <?php echo form_open('produto/add'); ?>
                  	<div class="panel-body">
          	<div class="box-body">
          		<div class="row clearfix">


					<div class="col-md-3">
						<label for="nome" class="control-label"><span class="text-danger">*</span>Descrição</label>
						<div class="form-group">
							<input type="text" name="nome" value="<?php echo $this->input->post('nome'); ?>" class="form-control" id="nome" />
							<span class="text-danger"><?php echo form_error('nome');?></span>
						</div>
					</div>

          <div class="col-md-2">
            <label for="codbarra" class="control-label">Código EAN</label>
            <div class="form-group">
              <input type="text" name="codbarra" value="<?php echo $this->input->post('codbarra'); ?>" class="form-control" id="codbarra" />
            </div>
          </div>

					<div class="col-md-2">
						<label for="custoproduto" class="control-label">Custo do produto</label>
						<div class="form-group">
							<input type="text" name="custoproduto" value="<?php echo $this->input->post('custoproduto'); ?>" class="form-control" id="custoproduto" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="precovenda" class="control-label"><span class="text-danger">*</span>Preço de venda</label>
						<div class="form-group">
							<input type="text" name="precovenda" value="<?php echo $this->input->post('precovenda'); ?>" class="form-control" id="precovenda" />
							<span class="text-danger"><?php echo form_error('precovenda');?></span>
						</div>
					</div>


          <div class="col-md-2">
            <label for="idcategoria" class="control-label"><span class="text-danger">*</span>Categorias</label>
            <div class="form-group">
              <select name="idcategoria" class="form-control m-bot15">
                <option value="">Selecione</option>
                <?php
                foreach($all_categoria_prod_servs as $categoria_prod_serv)
                {
                  $selected = ($categoria_prod_serv['idcategoria_prod_serv'] == $this->input->post('idcategoria')) ? ' selected="selected"' : "";

                  echo '<option value="'.$categoria_prod_serv['idcategoria_prod_serv'].'" '.$selected.'>'.$categoria_prod_serv['nome'].'</option>';
                }
                ?>
              </select>
              <span class="text-danger"><?php echo form_error('idcategoria');?></span>
              <input type="hidden" id="status" name="status" value='1' ?>
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
      	</section>
      </div>
    </div>
</div>

<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>

<script src="<?php echo base_url()?>assets/js/validate.js"></script>


  <script src="<?php echo base_url()?>assets/js/maskmoney.js"></script>


  <script type="text/javascript">



$('#custoproduto').maskMoney();
$('#precovenda').maskMoney();


</script>
