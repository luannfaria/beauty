<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Item Agenda Edit</h3>
            </div>
			<?php echo form_open('item_agenda/edit/'.$item_agenda['iditem_agenda']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="idagenda" class="control-label">Agenda</label>
						<div class="form-group">
							<select name="idagenda" class="form-control">
								<option value="">select agenda</option>
								<?php 
								foreach($all_agendas as $agenda)
								{
									$selected = ($agenda['idagenda'] == $item_agenda['idagenda']) ? ' selected="selected"' : "";

									echo '<option value="'.$agenda['idagenda'].'" '.$selected.'>'.$agenda['idagenda'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="horaagenda" class="control-label">Horaagenda</label>
						<div class="form-group">
							<input type="text" name="horaagenda" value="<?php echo ($this->input->post('horaagenda') ? $this->input->post('horaagenda') : $item_agenda['horaagenda']); ?>" class="form-control" id="horaagenda" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dataagenda" class="control-label">Dataagenda</label>
						<div class="form-group">
							<input type="text" name="dataagenda" value="<?php echo ($this->input->post('dataagenda') ? $this->input->post('dataagenda') : $item_agenda['dataagenda']); ?>" class="has-datepicker form-control" id="dataagenda" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="idservico" class="control-label">Idservico</label>
						<div class="form-group">
							<input type="text" name="idservico" value="<?php echo ($this->input->post('idservico') ? $this->input->post('idservico') : $item_agenda['idservico']); ?>" class="form-control" id="idservico" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="idatendente" class="control-label">Idatendente</label>
						<div class="form-group">
							<input type="text" name="idatendente" value="<?php echo ($this->input->post('idatendente') ? $this->input->post('idatendente') : $item_agenda['idatendente']); ?>" class="form-control" id="idatendente" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="valorservico" class="control-label">Valorservico</label>
						<div class="form-group">
							<input type="text" name="valorservico" value="<?php echo ($this->input->post('valorservico') ? $this->input->post('valorservico') : $item_agenda['valorservico']); ?>" class="form-control" id="valorservico" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dataexecucao" class="control-label">Dataexecucao</label>
						<div class="form-group">
							<input type="text" name="dataexecucao" value="<?php echo ($this->input->post('dataexecucao') ? $this->input->post('dataexecucao') : $item_agenda['dataexecucao']); ?>" class="has-datepicker form-control" id="dataexecucao" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label">Status</label>
						<div class="form-group">
							<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $item_agenda['status']); ?>" class="form-control" id="status" />
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