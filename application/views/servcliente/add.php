<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Servcliente Add</h3>
            </div>
            <?php echo form_open('servcliente/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="idcliente" class="control-label">Idcliente</label>
						<div class="form-group">
							<input type="text" name="idcliente" value="<?php echo $this->input->post('idcliente'); ?>" class="form-control" id="idcliente" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="idagenda" class="control-label">Idagenda</label>
						<div class="form-group">
							<input type="text" name="idagenda" value="<?php echo $this->input->post('idagenda'); ?>" class="form-control" id="idagenda" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="idservico" class="control-label">Idservico</label>
						<div class="form-group">
							<input type="text" name="idservico" value="<?php echo $this->input->post('idservico'); ?>" class="form-control" id="idservico" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dataagenda" class="control-label">Dataagenda</label>
						<div class="form-group">
							<input type="text" name="dataagenda" value="<?php echo $this->input->post('dataagenda'); ?>" class="has-datepicker form-control" id="dataagenda" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dataexecucao" class="control-label">Dataexecucao</label>
						<div class="form-group">
							<input type="text" name="dataexecucao" value="<?php echo $this->input->post('dataexecucao'); ?>" class="has-datepicker form-control" id="dataexecucao" />
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