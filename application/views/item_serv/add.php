<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Item Serv Add</h3>
            </div>
            <?php echo form_open('item_serv/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="idserv" class="control-label">Servico</label>
						<div class="form-group">
							<select name="idserv" class="form-control">
								<option value="">select servico</option>
								<?php 
								foreach($all_servicos as $servico)
								{
									$selected = ($servico['idservico'] == $this->input->post('idserv')) ? ' selected="selected"' : "";

									echo '<option value="'.$servico['idservico'].'" '.$selected.'>'.$servico['nomeservico'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nomeserv" class="control-label">Nomeserv</label>
						<div class="form-group">
							<input type="text" name="nomeserv" value="<?php echo $this->input->post('nomeserv'); ?>" class="form-control" id="nomeserv" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="idpacote" class="control-label">Idpacote</label>
						<div class="form-group">
							<input type="text" name="idpacote" value="<?php echo $this->input->post('idpacote'); ?>" class="form-control" id="idpacote" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="comissao" class="control-label"><span class="text-danger">*</span>Comissao</label>
						<div class="form-group">
							<input type="text" name="comissao" value="<?php echo $this->input->post('comissao'); ?>" class="form-control" id="comissao" />
							<span class="text-danger"><?php echo form_error('comissao');?></span>
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