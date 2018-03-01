<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Item Agendas Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('item_agenda/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Iditem Agenda</th>
						<th>Idagenda</th>
						<th>Horaagenda</th>
						<th>Dataagenda</th>
						<th>Idservico</th>
						<th>Idatendente</th>
						<th>Valorservico</th>
						<th>Dataexecucao</th>
						<th>Status</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($item_agendas as $i){ ?>
                    <tr>
						<td><?php echo $i['iditem_agenda']; ?></td>
						<td><?php echo $i['idagenda']; ?></td>
						<td><?php echo $i['horaagenda']; ?></td>
						<td><?php echo $i['dataagenda']; ?></td>
						<td><?php echo $i['idservico']; ?></td>
						<td><?php echo $i['idatendente']; ?></td>
						<td><?php echo $i['valorservico']; ?></td>
						<td><?php echo $i['dataexecucao']; ?></td>
						<td><?php echo $i['status']; ?></td>
						<td>
                            <a href="<?php echo site_url('item_agenda/edit/'.$i['iditem_agenda']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('item_agenda/remove/'.$i['iditem_agenda']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
