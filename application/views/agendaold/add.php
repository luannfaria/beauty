<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Agenda Add</h3>
            </div>
            <?php echo form_open('agenda/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="idatendente" class="control-label"><span class="text-danger">*</span>Atendente</label>
						<div class="form-group">
							<select name="idatendente" class="form-control">
								<option value="">select atendente</option>
								<?php 
								foreach($all_atendentes as $atendente)
								{
									$selected = ($atendente['idatendente'] == $this->input->post('idatendente')) ? ' selected="selected"' : "";

									echo '<option value="'.$atendente['idatendente'].'" '.$selected.'>'.$atendente['nome'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('idatendente');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="idcliente" class="control-label"><span class="text-danger">*</span>Cliente</label>
						<div class="form-group">
							<select name="idcliente" class="form-control">
								<option value="">select cliente</option>
								<?php 
								foreach($all_clientes as $cliente)
								{
									$selected = ($cliente['idcliente'] == $this->input->post('idcliente')) ? ' selected="selected"' : "";

									echo '<option value="'.$cliente['idcliente'].'" '.$selected.'>'.$cliente['nome'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('idcliente');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label">Status</label>
						<div class="form-group">
							<select name="status" class="form-control">
								<option value="">select</option>
								<?php 
								$status_values = array(
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
						<label for="dataagenda" class="control-label"><span class="text-danger">*</span>Dataagenda</label>
						<div class="form-group">
							<input type="text" name="dataagenda" value="<?php echo $this->input->post('dataagenda'); ?>" class="has-datepicker form-control" id="dataagenda" />
							<span class="text-danger"><?php echo form_error('dataagenda');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="horaagenda" class="control-label"><span class="text-danger">*</span>Horaagenda</label>
						<div class="form-group">
							<input type="text" name="horaagenda" value="<?php echo $this->input->post('horaagenda'); ?>" class="form-control" id="horaagenda" />
							<span class="text-danger"><?php echo form_error('horaagenda');?></span>
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