

<section id="main-content">
  <section class="wrapper">

    <div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar usuario</h3>
            </div>
			<?php echo form_open('usuario/edit/'.$usuario['idusuario']); ?>
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
									$selected = ($value == $usuario['status']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="senha" class="control-label"><span class="text-danger">*</span>Senha</label>
						<div class="form-group">
							<input type="text" name="senha" value="<?php echo ($this->input->post('senha') ? $this->input->post('senha') : $usuario['senha']); ?>" class="form-control" id="senha" />
							<span class="text-danger"><?php echo form_error('senha');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="login" class="control-label"><span class="text-danger">*</span>Login</label>
						<div class="form-group">
							<input type="text" name="login" value="<?php echo ($this->input->post('login') ? $this->input->post('login') : $usuario['login']); ?>" class="form-control" id="login" />
							<span class="text-danger"><?php echo form_error('login');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="datacadastro" class="control-label">Datacadastro</label>
						<div class="form-group">
							<input type="text" name="datacadastro" value="<?php echo ($this->input->post('datacadastro') ? $this->input->post('datacadastro') : $usuario['datacadastro']); ?>" class="has-datepicker form-control" id="datacadastro" />
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
