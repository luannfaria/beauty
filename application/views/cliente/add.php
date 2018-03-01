<section id="main-content">
  <section class="wrapper">

    <script type="text/javascript">
    function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
    }
    function execmascara(){
    v_obj.value=v_fun(v_obj.value)
    }
    function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
    }
    </script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Novo cliente</h3>
            </div>
            <?php echo form_open('cliente/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">

					<div class="col-md-5">
						<label for="nome" class="control-label"><span class="text-danger">*</span>Nome</label>
						<div class="form-group">
							<input type="text" name="nome" value="<?php echo $this->input->post('nome'); ?>" class="form-control" id="nome" />
							<span class="text-danger"><?php echo form_error('nome');?></span>
						</div>
					</div>
					<div class="col-md-5">
						<label for="sobrenome" class="control-label"><span class="text-danger">*</span>Sobrenome</label>
						<div class="form-group">
							<input type="text" name="sobrenome" value="<?php echo $this->input->post('sobrenome'); ?>" class="form-control" id="sobrenome" />
							<span class="text-danger"><?php echo form_error('sobrenome');?></span>
						</div>
					</div>
					<div class="col-md-2">
						<label for="datacadastro" class="control-label">Data Cadastro</label>
						<div class="form-group">
							<input type="text" name="datacadastro" value="<?php date_default_timezone_set('America/Sao_Paulo');  echo date('d/m/Y'); ?>" class="has-datepicker form-control" id="datacadastro" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="telefonefixo" class="control-label">Telefone Fixo</label>
						<div class="form-group">
							<input type="text" name="telefonefixo" placeholder=" Ex: (XX) XXXXX-XXXX" onkeyup="mascara( this, mtel );" maxlength="14" value="<?php echo $this->input->post('telefonefixo'); ?>" class="form-control" id="telefonefixo" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="telefonecelular" class="control-label"><span class="text-danger">*</span>Telefone Celular</label>
						<div class="form-group">
							<input type="text" name="telefonecelular" placeholder=" Ex: (XX) XXXXX-XXXX" onkeyup="mascara( this, mtel );" maxlength="15" value="<?php echo $this->input->post('telefonecelular'); ?>" class="form-control" id="telefonecelular" />
							<span class="text-danger"><?php echo form_error('telefonecelular');?></span>
						</div>
					</div>
					<div class="col-md-3">
						<label for="rua" class="control-label">Rua</label>
						<div class="form-group">
							<input type="text" name="rua" value="<?php echo $this->input->post('rua'); ?>" class="form-control" id="rua" />
						</div>
					</div>
					<div class="col-md-1">
						<label for="numero" class="control-label">Número</label>
						<div class="form-group">
							<input type="text" name="numero" value="<?php echo $this->input->post('numero'); ?>" class="form-control" id="numero" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="bairro" class="control-label">Bairro</label>
						<div class="form-group">
							<input type="text" name="bairro" value="<?php echo $this->input->post('bairro'); ?>" class="form-control" id="bairro" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="cidade" class="control-label">Cidade</label>
						<div class="form-group">
							<input type="text" name="cidade" value="<?php echo $this->input->post('cidade'); ?>" class="form-control" id="cidade" />
						</div>
					</div>
					<div class="col-md-10">
						<label for="obs" class="control-label">Observação</label>
						<div class="form-group">
							<input type="text" name="obs" value="<?php echo $this->input->post('obs'); ?>" class="form-control" id="obs" />
						</div>
					</div>


              <input type="hidden" id="status" name="status" value="1">

				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> CADASTRAR
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>
</section>
</section>
