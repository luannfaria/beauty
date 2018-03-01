<section id="main-content">
  <section class="wrapper">

<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Categoria</h3>
            </div>
			<?php echo form_open('categoria_prod_serv/edit/'.$categoria_prod_serv['idcategoria_prod_serv']); ?>
			<div class="box-body">
				<div class="row clearfix">

          <div class="col-md-6">
						<label for="nome" class="control-label"><span class="text-danger">*</span>Nome</label>
						<div class="form-group">
							<input type="text" name="nome" value="<?php echo ($this->input->post('nome') ? $this->input->post('nome') : $categoria_prod_serv['nome']); ?>" class="form-control" id="nome" />
							<span class="text-danger"><?php echo form_error('nome');?></span>
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
                  $selected = ($value == $categoria_prod_serv['status']) ? ' selected="selected"' : "";

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
		</div>
    </div>
</div>
