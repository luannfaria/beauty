<section id="main-content">
  <section class="wrapper">
<div class="row">
    <div class="col-md-12">
      <section class="panel">
        <header class="panel-heading">
          <i class="fa fa-shopping-cart"></i>Editar produto
        </header>
			<?php echo form_open('produto/edit/'.$produto['idproduto']); ?>
      	<div class="panel-body">
			<div class="box-body">
				<div class="row clearfix">

          <div class="col-md-3">
            <label for="nome" class="control-label"><span class="text-danger">*</span>Descrição</label>
            <div class="form-group">
              <input type="text" name="nome" value="<?php echo ($this->input->post('nome') ? $this->input->post('nome') : $produto['nome']); ?>" class="form-control" id="nome" />
              <span class="text-danger"><?php echo form_error('nome');?></span>
            </div>
          </div>

          <div class="col-md-2">
            <label for="codbarra" class="control-label">Código EAN</label>
            <div class="form-group">
              <input type="text" name="codbarra" value="<?php echo ($this->input->post('codbarra') ? $this->input->post('codbarra') : $produto['codbarra']); ?>" class="form-control" id="codbarra" />
            </div>
          </div>

          <div class="col-md-2">
            <label for="custoproduto" class="control-label">Custo do produto</label>
            <div class="form-group">
              <input type="text" name="custoproduto" value="<?php echo ($this->input->post('custoproduto') ? $this->input->post('custoproduto') : $produto['custoproduto']); ?>" class="form-control" id="custoproduto" />
            </div>
          </div>

          <div class="col-lg-1">
            <label for="precovenda" class="control-label"><span class="text-danger">*</span>Venda</label>
            <div class="form-group">
              <input type="text" name="precovenda" value="<?php echo ($this->input->post('precovenda') ? $this->input->post('precovenda') : $produto['precovenda']); ?>" class="form-control" id="precovenda" />
              <span class="text-danger"><?php echo form_error('precovenda');?></span>
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
									$selected = ($value == $produto['status']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								}
								?>
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
		</section>
  </div>
    </div>
</div>
