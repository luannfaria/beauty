<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Servcliente Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('servcliente/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Idservcliente</th>
						<th>Idcliente</th>
						<th>Idagenda</th>
						<th>Idservico</th>
						<th>Dataagenda</th>
						<th>Dataexecucao</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($servcliente as $s){ ?>
                    <tr>
						<td><?php echo $s['idservcliente']; ?></td>
						<td><?php echo $s['idcliente']; ?></td>
						<td><?php echo $s['idagenda']; ?></td>
						<td><?php echo $s['idservico']; ?></td>
						<td><?php echo $s['dataagenda']; ?></td>
						<td><?php echo $s['dataexecucao']; ?></td>
						<td>
                            <a href="<?php echo site_url('servcliente/edit/'.$s['idservcliente']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('servcliente/remove/'.$s['idservcliente']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
