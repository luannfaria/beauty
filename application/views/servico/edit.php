<section id="main-content">
  <section class="wrapper">

    <script type="text/javascript">
    function formatarMoeda() {
    var elemento = document.getElementById('valorserv');
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
    <script type="text/javascript">
    function formatarComissao() {
    var elemento = document.getElementById('comissao');
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


              	<h3 class="box-title">Editar Serviço</h3>
            </div>
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
							<input type="text" name="valorserv" value="<?php echo ($this->input->post('valorserv') ? $this->input->post('valorserv') : $servico['valorserv']); ?>" class="form-control money" onkeyup="formatarMoeda();" id="valorserv" />
							<span class="text-danger"><?php echo form_error('valorserv');?></span>
						</div>
					</div>

					<div class="col-md-2">
						<label for="comissao" class="control-label">Comissão</label>
						<div class="form-group">
							<input type="text" name="comissao" value="<?php echo ($this->input->post('comissao') ? $this->input->post('comissao') : $servico['comissao']); ?>" class="form-control money" onkeyup="formatarComissao();" id="comissao" />
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
    </div>
</div>
<script src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>assets/js/maskmoney.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
          $(".money").maskMoney();

      });
</script>
