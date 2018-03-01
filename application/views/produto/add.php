<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Produto Add</h3>
            </div>
            <?php echo form_open('produto/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="status" class="control-label">Status</label>
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
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="idcategoria" class="control-label">Categoria Prod Serv</label>
						<div class="form-group">
							<select name="idcategoria" class="form-control">
								<option value="">select categoria_prod_serv</option>
								<?php 
								foreach($all_categoria_prod_servs as $categoria_prod_serv)
								{
									$selected = ($categoria_prod_serv['idcategoria_prod_serv'] == $this->input->post('idcategoria')) ? ' selected="selected"' : "";

									echo '<option value="'.$categoria_prod_serv['idcategoria_prod_serv'].'" '.$selected.'>'.$categoria_prod_serv['nome'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nome" class="control-label"><span class="text-danger">*</span>Nome</label>
						<div class="form-group">
							<input type="text" name="nome" value="<?php echo $this->input->post('nome'); ?>" class="form-control" id="nome" />
							<span class="text-danger"><?php echo form_error('nome');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="custoproduto" class="control-label">Custoproduto</label>
						<div class="form-group">
							<input type="text" name="custoproduto" value="<?php echo $this->input->post('custoproduto'); ?>" class="form-control" id="custoproduto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="precovenda" class="control-label"><span class="text-danger">*</span>Precovenda</label>
						<div class="form-group">
							<input type="text" name="precovenda" value="<?php echo $this->input->post('precovenda'); ?>" class="form-control" id="precovenda" />
							<span class="text-danger"><?php echo form_error('precovenda');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="codbarra" class="control-label">Codbarra</label>
						<div class="form-group">
							<input type="text" name="codbarra" value="<?php echo $this->input->post('codbarra'); ?>" class="form-control" id="codbarra" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="marca" class="control-label">Marca</label>
						<div class="form-group">
							<input type="text" name="marca" value="<?php echo $this->input->post('marca'); ?>" class="form-control" id="marca" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>