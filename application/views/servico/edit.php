<section id="main-content">
  <section class="wrapper">




<div class="row">

      <div class="col-lg-12">
                  <section class="panel">
                    <header class="panel-heading">
                      Editar serviço
                    </header>
                    <div class="panel-body">

			<?php echo form_open('servico/edit/'.$servico['idservico']); ?>
			<div class="box-body">
				<div class="row clearfix">

					<div class="col-md-4">
						<label for="nomeservico" class="control-label"><span class="text-danger">*</span>Nome serviço</label>
						<div class="form-group">
							<input type="text" name="nomeservico" value="<?php echo ($this->input->post('nomeservico') ? $this->input->post('nomeservico') : $servico['nomeservico']); ?>" class="form-control" id="nomeservico" />
							<span class="text-danger"><?php echo form_error('nomeservico');?></span>
						</div>
					</div>
					<div class="col-md-2">
						<label for="valorserv" class="control-label"><span class="text-danger">*</span>Valor serviço</label>
						<div class="form-group">
							<input type="text" name="valorserv" value="<?php echo ($this->input->post('valorserv') ? $this->input->post('valorserv') : $servico['valorserv']); ?>" class="form-control" onfocus="this.value=''";  id="valorserv" />
							<span class="text-danger"><?php echo form_error('valorserv');?></span>
						</div>
					</div>

					<div class="col-md-2">
						<label for="comissao" class="control-label">Comissão</label>
						<div class="form-group">
							<input type="text" name="comissao" value="<?php echo ($this->input->post('comissao') ? $this->input->post('comissao') : $servico['comissao']); ?>" class="form-control" onfocus="this.value=''"; id="comissao" />
						</div>
					</div>

          <div class="col-md-2">
            <label for="idcategoria" class="control-label"><span class="text-danger">*</span>Categoria</label>
            <div class="form-group">
              <select name="idcategoria" class="form-control">
                <option value="">Selecione uma categoria</option>
                <?php
                foreach($all_categoria_prod_servs as $categoria_prod_serv)
                {
                  $selected = ($categoria_prod_serv['idcategoria_prod_serv'] == $servico['idcategoria']) ? ' selected="selected"' : "";

                  echo '<option value="'.$categoria_prod_serv['idcategoria_prod_serv'].'" '.$selected.'>'.$categoria_prod_serv['nome'].'</option>';
                }
                ?>
              </select>
              <span class="text-danger"><?php echo form_error('idcategoria');?></span>
            </div>
          </div>

          <div class="col-md-2">
            <label for="status" class="control-label">Status</label>
            <div class="form-group">
              <select name="status" class="form-control">
                <option value="">Selecione</option>
                <?php
                $status_values = array(
                  '1'=>'ATIVO',
                  '2'=>'INATIVO',
                );

                foreach($status_values as $value => $display_text)
                {
                  $selected = ($value == $servico['status']) ? ' selected="selected"' : "";

                  echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                }
                ?>
              </select>
            </div>
          </div>

							<input type="hidden" name="tiposervico" value="1" class="form-control" id="tiposervico" />


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
    <script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.4.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>

    <script src="<?php echo base_url()?>assets/js/validate.js"></script>


      <script src="<?php echo base_url()?>assets/js/maskmoney.js"></script>


      <script type="text/javascript">


    $('#valorserv').maskMoney();
    $('#comissao').maskMoney();


    </script>
