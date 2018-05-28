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
      <section class="panel">
        <header class="panel-heading">
          Adicionar atendente
        </header>

      <div class="painel-body">
        	<?php echo form_open('atendente/edit/'.$atendente['idatendente']); ?>

        <div class="box-body">
          <div class="row clearfix">


					<div class="col-md-3">
						<label for="nome" class="control-label"><span class="text-danger">*</span>Nome</label>
						<div class="form-group">
							<input type="text" name="nome" value="<?php echo ($this->input->post('nome') ? $this->input->post('nome') : $atendente['nome']); ?>" class="form-control" id="nome" />
							<span class="text-danger"><?php echo form_error('nome');?></span>
						</div>
					</div>
					<div class="col-md-3">
						<label for="sobrenome" class="control-label"><span class="text-danger">*</span>Sobrenome</label>
						<div class="form-group">
							<input type="text" name="sobrenome" value="<?php echo ($this->input->post('sobrenome') ? $this->input->post('sobrenome') : $atendente['sobrenome']); ?>" class="form-control" id="sobrenome" />
							<span class="text-danger"><?php echo form_error('sobrenome');?></span>
						</div>
					</div>
          <div class="col-md-2">
            <label for="cpf" class="control-label">CPF</label>
            <div class="form-group">
              <input type="text" name="cpf" value="<?php echo ($this->input->post('cpf') ? $this->input->post('cpf') : $atendente['cpf']); ?>" class="form-control" id="cpf" />
            </div>
          </div>

          <div class="col-md-6">
						<label for="comissao" class="control-label">Comissão</label>
						<div class="form-group">
							<input type="text" name="comissao" value="<?php echo ($this->input->post('comissao') ? $this->input->post('comissao') : $atendente['comissao']); ?>" class="form-control" id="comissao" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dataadmissao" class="control-label">Data admissão</label>
						<div class="form-group">
							<input type="text" name="dataadmissao" value="<?php echo ($this->input->post('dataadmissao') ? $this->input->post('dataadmissao') : $atendente['dataadmissao']); ?>" class="has-datepicker form-control" id="dataadmissao" />
						</div>
					</div>

          <div class="col-md-6">
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
									$selected = ($value == $atendente['status']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								}
								?>
							</select>
						</div>
					</div>

          <div class="col-md-6">
						<label for="datanascimento" class="control-label">Data nascimento</label>
						<div class="form-group">
							<input type="text" name="datanascimento" value="<?php echo ($this->input->post('datanascimento') ? $this->input->post('datanascimento') : $atendente['datanascimento']); ?>" class="has-datepicker form-control" id="datanascimento" />
						</div>
					</div>


					<div class="col-md-6">
						<label for="telefonecelular" class="control-label"><span class="text-danger">*</span>Telefone celular</label>
						<div class="form-group">
							<input type="text" name="telefonecelular" placeholder="Ex: (XX)XXXXX-XXXX" onkeyup="mascara( this, mtel );" maxlength="15" value="<?php echo ($this->input->post('telefonecelular') ? $this->input->post('telefonecelular') : $atendente['telefonecelular']); ?>" class="form-control" id="telefonecelular" />
							<span class="text-danger"><?php echo form_error('telefonecelular');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="telefonefixo" class="control-label">Telefone fixo</label>
						<div class="form-group">
							<input type="text" name="telefonefixo"  placeholder="Ex: (XX)XXXX-XXXX" onkeyup="mascara( this, mtel );" maxlength="14" value="<?php echo ($this->input->post('telefonefixo') ? $this->input->post('telefonefixo') : $atendente['telefonefixo']); ?>" class="form-control" id="telefonefixo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="rua" class="control-label">Rua</label>
						<div class="form-group">
							<input type="text" name="rua" value="<?php echo ($this->input->post('rua') ? $this->input->post('rua') : $atendente['rua']); ?>" class="form-control" id="rua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="numero" class="control-label">Numero</label>
						<div class="form-group">
							<input type="text" name="numero" value="<?php echo ($this->input->post('numero') ? $this->input->post('numero') : $atendente['numero']); ?>" class="form-control" id="numero" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="bairro" class="control-label">Bairro</label>
						<div class="form-group">
							<input type="text" name="bairro" value="<?php echo ($this->input->post('bairro') ? $this->input->post('bairro') : $atendente['bairro']); ?>" class="form-control" id="bairro" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cidade" class="control-label">Cidade</label>
						<div class="form-group">
							<input type="text" name="cidade" value="<?php echo ($this->input->post('cidade') ? $this->input->post('cidade') : $atendente['cidade']); ?>" class="form-control" id="cidade" />
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
