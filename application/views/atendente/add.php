<section id="main-content">
  <section class="wrapper">


    <link rel="stylesheet" href="https://jquery.ui.timepicker.css?v=0.3.3" type="text/css" />
         <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

           <script src="https://fgelinas.com/code/timepicker/jquery.ui.timepicker.js?v=0.3.3"></script>

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
        <div class="panel-body">
            <?php echo form_open('atendente/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-3">
						<label for="nome" class="control-label"><span class="text-danger">*</span>Nome</label>
						<div class="form-group">
							<input type="text" name="nome" value="<?php echo $this->input->post('nome'); ?>" class="form-control" id="nome" />
							<span class="text-danger"><?php echo form_error('nome');?></span>
						</div>
					</div>
					<div class="col-md-3">
						<label for="sobrenome" class="control-label"><span class="text-danger">*</span>Sobrenome</label>
						<div class="form-group">
							<input type="text" name="sobrenome" value="<?php echo $this->input->post('sobrenome'); ?>" class="form-control" id="sobrenome" />
							<span class="text-danger"><?php echo form_error('sobrenome');?></span>
						</div>
					</div>


          <div class="col-md-2">
            <label for="cpf" class="control-label">CPF</label>
            <div class="form-group">
              <input type="text" name="cpf" value="<?php echo $this->input->post('cpf'); ?>" class="form-control" id="cpf" />
            </div>
          </div>



          <div class="col-md-2">
						<label for="dataadmissao" class="control-label">Data admissão</label>
						<div class="form-group">
							<input type="text" name="dataadmissao" value="<?php echo $this->input->post('dataadmissao'); ?>" class="form-control" id="dataadmissao" />
						</div>
					</div>


							<input type="hidden" name="status" value="1" class="form-control" id="status" />




					<div class="col-md-2">
						<label for="datanascimento" class="control-label">Data Nascimento</label>
						<div class="form-group">
							<input type="text" name="datanascimento" value="<?php echo $this->input->post('datanascimento'); ?>" class="has-datepicker form-control" id="datanascimento" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="telefonecelular" class="control-label"><span class="text-danger">*</span>Telefone Celular</label>
						<div class="form-group">
							<input type="text" name="telefonecelular" placeholder=" Ex: (XX) XXXXX-XXXX" onkeyup="mascara( this, mtel );" maxlength="15" value="<?php echo $this->input->post('telefonecelular'); ?>" class="form-control" id="telefonecelular" />
							<span class="text-danger"><?php echo form_error('telefonecelular');?></span>
						</div>
					</div>
					<div class="col-md-2">
						<label for="telefonefixo" class="control-label">Telefone Fixo</label>
						<div class="form-group">
							<input type="text" name="telefonefixo" placeholder=" Ex: (XX) XXXX-XXXX" onkeyup="mascara( this, mtel );" maxlength="14" value="<?php echo $this->input->post('telefonefixo'); ?>" class="form-control" id="telefonefixo" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="rua" class="control-label">Rua</label>
						<div class="form-group">
							<input type="text" name="rua" value="<?php echo $this->input->post('rua'); ?>" class="form-control" id="rua" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="numero" class="control-label">Numero</label>
						<div class="form-group">
							<input type="text" name="numero" value="<?php echo $this->input->post('numero'); ?>" class="form-control" id="numero" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="bairro" class="control-label">Bairro</label>
						<div class="form-group">
							<input type="text" name="bairro" value="<?php echo $this->input->post('bairro'); ?>" class="form-control" id="bairro" />
						</div>
					</div>
					<div class="col-md-5">
						<label for="cidade" class="control-label">Cidade</label>
						<div class="form-group">
							<input type="text" name="cidade" value="<?php echo $this->input->post('cidade'); ?>" class="form-control" id="cidade" />
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
      </form>
    </div>
</div>

<script>
$( function() {
  $( "#dataadmissao" ).datepicker({ dateFormat: 'd/mm/yy' });

    $( "#datapagamento" ).datepicker({ dateFormat: 'd/mm/yy' });

});
</script>
