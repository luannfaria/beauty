<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Servcliente Edit</h3>
            </div>
			<?php echo form_open('servcliente/edit/'.$servcliente['idservcliente']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="idcliente" class="control-label">Idcliente</label>
						<div class="form-group">
							<input type="text" name="idcliente" value="<?php echo ($this->input->post('idcliente') ? $this->input->post('idcliente') : $servcliente['idcliente']); ?>" class="form-control" id="idcliente" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="idagenda" class="control-label">Idagenda</label>
						<div class="form-group">
							<input type="text" name="idagenda" value="<?php echo ($this->input->post('idagenda') ? $this->input->post('idagenda') : $servcliente['idagenda']); ?>" class="form-control" id="idagenda" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="idservico" class="control-label">Idservico</label>
						<div class="form-group">
							<input type="text" name="idservico" value="<?php echo ($this->input->post('idservico') ? $this->input->post('idservico') : $servcliente['idservico']); ?>" class="form-control" id="idservico" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dataagenda" class="control-label">Dataagenda</label>
						<div class="form-group">
							<input type="text" name="dataagenda" value="<?php echo ($this->input->post('dataagenda') ? $this->input->post('dataagenda') : $servcliente['dataagenda']); ?>" class="has-datepicker form-control" id="dataagenda" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dataexecucao" class="control-label">Dataexecucao</label>
						<div class="form-group">
							<input type="text" name="dataexecucao" value="<?php echo ($this->input->post('dataexecucao') ? $this->input->post('dataexecucao') : $servcliente['dataexecucao']); ?>" class="has-datepicker form-control" id="dataexecucao" />
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